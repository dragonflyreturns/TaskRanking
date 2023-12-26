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
        DB::table('categories')->insert([
            'name' => 'Class 1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Class 2',
        ]);
        DB::table('categories')->insert([
            'name' => 'Homework 1',
        ]);
        DB::table('categories')->insert([
            'name' => 'Homework 2',
        ]);
    }
}
