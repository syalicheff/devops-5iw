<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = new \App\Models\Categories();
        $categories->nom = "Downers";
        $categories->is_online = 1;
        $categories->save();

        $categories = new \App\Models\Categories();
        $categories->nom = "Uppers";
        $categories->is_online = 1;
        $categories->save();

        $categories = new \App\Models\Categories();
        $categories->nom = "Trips";
        $categories->is_online = 1;
        $categories->save();

        $categories = new \App\Models\Categories();
        $categories->nom = "Aphrodisiaques";
        $categories->is_online = 1;
        $categories->save();
    }
}
