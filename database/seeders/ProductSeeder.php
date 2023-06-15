<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            "category_id" => "4",
            "name" => "Nasi Goreng",
            "stock" => 5,
            "price" => 14000,
            "image" => "",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('products')->insert([
            "category_id" => "2",
            "name" => "Soup Pitik",
            "stock" => 5,
            "price" => 20000,
            "image" => "",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('products')->insert([
            "category_id" => "6",
            "name" => "Mie Dog Dog",
            "stock" => 5,
            "price" => 12000,
            "image" => "",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('products')->insert([
            "category_id" => "1",
            "name" => "Rendang Kuda",
            "stock" => 5,
            "price" => 35000,
            "image" => "",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
