<?php

namespace App\Http\Controllers\api;

use DB;
use Image;
use App\Models\Plant;
use App\Models\Species;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class PlantTrackerController extends Controller
{
    public function index(Request $request)
    {
        // if($request->ajax()) {
            // return paginated result if time allowed
            return Plant::with('species')->get();
        // }
    }

    public function store(Request $request)
    {
        // backend validations
        try {
            $this->validate(request(), [
                'plantName' => 'required|unique:plants,plant_name',
                'species' => 'required',
                'wateringInstruction' => 'required',
                'plantImage'=>'required|file'
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'message'    => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }

        $plantNameInput = $request->plantName; // val auto trimmed by laravel
        $speciesNameInput = $request->species;
        $imageInput = $request->file('plantImage');
        $filePath = public_path('/images');

        /**
         * Save plant and species records to db
         */
        DB::beginTransaction();

        try {
            $species = Species::where('species_name', $speciesNameInput)->first();
            if(!$species) {
               $species = Species::create([
                    'species_name' => $speciesNameInput,
                    'slug' => Str::slug($speciesNameInput)
                ]);
            }
    
            $species->plants()->create([
                'plant_name' => $plantNameInput,
                'slug' => Str::slug($plantNameInput),
                'watering_instruction' => htmlspecialchars($request->wateringInstruction), // SQL injection, csrf filtering
                'image' => $imageInput->getClientOriginalName()
            ]);   
            DB::commit();

            $img = Image::make($imageInput->path());
            $img->resize(150, 200, function ($const) {
               // $const->aspectRatio();
            // })->save($filePath.'/'.'plant_'.$id.'.'.$image->extension());
            })->save($filePath.'/'.$imageInput->getClientOriginalName());
            
            return response()->json([
                'status' => 'success',
                'message'    => 'Plant Created',
            ], 201);
        } catch (\Throwable $e) {
            DB::rollback();

            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
}
