<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkspedisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("ekspedisi")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        DB::table("ekspedisi")->insert([
            ["name" => "Grab Send","ongkir"=> 15000],
            ["name" => "Go Send","ongkir"=> 14000],
            ["name" => "Courier","ongkir"=> 13000],
            ["name" => "Ojek","ongkir"=> 10000],

        ]);
    }
}
