<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class WomenShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Max 90',
            'price'=> 130,
            'image'=> '1.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Max 90',
            'price'=> 130,
            'image'=> '2.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Zoom',
            'price'=> 120,
            'image'=> '3.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Zoom',
            'price'=> 120,
            'image'=> '4.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Revolution',
            'price'=> 60,
            'image'=> '5.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Revolution',
            'price'=> 60,
            'image'=> '6.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Max 97',
            'price'=> 175,
            'image'=> '7.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Max 97',
            'price'=> 175,
            'image'=> '8.jpg'
           
        ]);
        DB::table('women_shoes')->insert([
            'title'=> 'Nike Air Max 90',
            'price'=> 130,
            'image'=> '9.jpg'
           
        ]);
    }
}
