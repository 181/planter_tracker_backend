<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // another seeding option using factory
        // \App\Models\Plant::factory(12)->create();
        // \App\Models\Species::factory(12)->create();

        Model::unguard();

        $this->call(SpeciesTableSeeder::class);
        $this->call(PlantsTableSeeder::class);

        Model::reguard();
    }
}
