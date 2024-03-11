<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
          "name"=>"booK",
          "desc"=>"bool one",
          "price"=>100,
          "category_id"=>1,
          "user_id"=>1,

        ]);
    }
}
