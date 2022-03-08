<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenClothingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 55,
            'image'=> '1.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 55,
            'image'=> '2.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '3.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '4.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '5.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '6.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '7.jpg'
           
        ]);
        DB::table('men_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 60,
            'image'=> '8.jpg'
           
        ]);
    }
}
