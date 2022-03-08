<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 90',
            'price'=> 130,
            'image'=> '1.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 90',
            'price'=> 130,
            'image'=> '2.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 90 Surplus',
            'price'=> 150,
            'image'=> '3.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 90 SE',
            'price'=> 140,
            'image'=> '4.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Plus',
            'price'=> 175,
            'image'=> '5.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Plus',
            'price'=> 175,
            'image'=> '6.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Genome',
            'price'=> 170,
            'image'=> '7.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Genome',
            'price'=> 170,
            'image'=> '8.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Genome',
            'price'=> 120,
            'image'=> '9.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max Genome',
            'price'=> 130,
            'image'=> '10.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 97',
            'price'=> 175,
            'image'=> '11.jpg'
           
        ]);
        DB::table('men_shoes')->insert([
            'title'=> 'Nike Air Max 97',
            'price'=> 175,
            'image'=> '12.jpg'
           
        ]);
    }
}
