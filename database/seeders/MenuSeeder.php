<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("menu")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        DB::table("menu")->insert([
            ["id_kategori"=>2,"name" => "Indomie","harga"=>3000,"deskripsi"=>"indomiegorenk"],
            ["id_kategori"=>2,"name" => "Sarimie","harga"=>2500,"deskripsi"=>"sarimiegorenk"],
            ["id_kategori"=>2,"name" => "Ramen","harga"=>25000,"deskripsi"=>"special ramen"],
            ["id_kategori"=>4,"name" => "Ice Tea","harga"=>4000,"deskripsi"=>"sweet ice tea"],
            ["id_kategori"=>4,"name" => "Soju","harga"=>75000,"deskripsi"=>"fermented alcoholic beverages"],
            ["id_kategori"=>5,"name" => "Ice Cream","harga"=>5000,"deskripsi"=>"ya ice cream"],
            ["id_kategori"=>5,"name" => "Pudding","harga"=>15000,"deskripsi"=>"chocolate pudding"],
            ["id_kategori"=>4,"name" => "Oreo Milkshake","harga"=>25000,"deskripsi"=>"cookies n cream milkshake"],
            ["id_kategori"=>1,"name" => "Callifornia Roll","harga"=>55000,"deskripsi"=>"Callifornia Roll"],
            ["id_kategori"=>1,"name" => "Sashimi","harga"=>35000,"deskripsi"=>"Tuna Sashimi"],
            ["id_kategori"=>3,"name" => "Fried Rice","harga"=>25000,"deskripsi"=>"yummy"],
            ["id_kategori"=>3,"name" => "Porridge","harga"=>20000,"deskripsi"=>"bubur"],

        ]);
    }
}
