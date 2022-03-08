<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WomenClothingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 26,
            'image'=> '1.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 26,
            'image'=> '2.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 20,
            'image'=> '3.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 20,
            'image'=> '4.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 20,
            'image'=> '5.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 12,
            'image'=> '6.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 12,
            'image'=> '7.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 13,
            'image'=> '8.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 13,
            'image'=> '9.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 29,
            'image'=> '10.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 29,
            'image'=> '11.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 29,
            'image'=> '12.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 50,
            'image'=> '13.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 50,
            'image'=> '14.jpg'
           
        ]);
        DB::table('women_clothing')->insert([
            'title'=> 'Sports Suit',
            'price'=> 50,
            'image'=> '15.jpg'
           
        ]);
    }
}
