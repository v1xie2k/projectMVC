<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HtransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table("htrans")->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
        $time = Carbon::today()->toDateString();
        $timeDate = Carbon::now();
        DB::table("htrans")->insert([
            ["id_user" => "4","id_ekspedisi"=> 1,"quantity"=>2,"total"=>19000,"date"=>$time, "created_at" => $timeDate, "updated_at" => $timeDate],
            ["id_user" => "5","id_ekspedisi"=> 2,"quantity"=>2,"total"=>18000,"date"=>$time, "created_at" => $timeDate, "updated_at" => $timeDate],
            ["id_user" => "5","id_ekspedisi"=> 4,"quantity"=>2,"total"=>22500,"date"=>$time, "created_at" => $timeDate, "updated_at" => $timeDate],
            ["id_user" => "6","id_ekspedisi"=> 1,"quantity"=>7,"total"=>39000,"date"=>$time, "created_at" => $timeDate, "updated_at" => $timeDate],

        ]);
    }
}
