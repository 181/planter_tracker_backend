<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 12; $i++) { 
        	$name = 'plant_' . $i;
            
            Plant::create([
                'plant_name' => $name,
                'slug' => Str::slug($name),
                'species_id' => $i,
                'watering_instruction' => 'This watering instruction ' . $i . ' is ***really important***.',
                'image' => $name
            ]);
        }
    }
}
