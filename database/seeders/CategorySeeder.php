<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("kategori_menu")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        DB::table("kategori_menu")->insert([
            ["name" => "Noodles"],
            ["name" => "Beverages"],
            ["name" => "Dessert"],
            ["name" => "Bread"],
            ["name" => "Burger"],
            ["name" => "Rice"],

        ]);
    }
}
