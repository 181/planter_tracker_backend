<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 12; $i++) { 
            $name = 'species_' . $i;
            
            Species::create([
                'species_name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
