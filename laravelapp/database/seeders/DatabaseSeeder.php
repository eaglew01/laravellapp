<?php

namespace Database\Seeders;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 1,
            'birthday' => Carbon::createFromFormat('d/m/Y', '14/02/1989')->format('Y-m-d'),
            'aboutME' => 'Ik ben de admin account die verplicht werd toegevoegd.'
        
        
        ]);
        
        DB::table('users')->insert([
            'name' => 'eaglew',
            'email' => 'wouterdecleer@hotmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 1,
            'birthday' => Carbon::createFromFormat('d/m/Y', '14/02/1989')->format('Y-m-d'),
            'aboutME' => 'Ik ben de admin account van de Laravel developer'
        
        
        ]);


        DB::table('vacancies')->insert([
            'title' => 'Dit is vacature 1',
            'body' => 'In a world where technology continues to shape our lives, the importance of adaptability cannot be overstated. From the moment we wake up, we interact with devices that have become extensions of ourselves. Smartphones, tablets, and laptops are the gateways to information, connecting us to the vast digital realm. The rapid evolution of these technologies challenges us to keep pace, and this dynamic landscape demands constant learning and flexibility.

            At the same time, amidst the digital chaos, the allure of nature and simplicity remains undiminished. The soothing rustle of leaves in a forest, the majesty of a mountain range, and the beauty of a starry night sky offer respite from the digital deluge. Balancing our tech-savvy lives with a touch of nature has become essential for our well-being.',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
                  ]);

        DB::table('vacancies')->insert([
            'title' => 'Dit is vacature 2',
            'body' => 'In a world where technology continues to shape our lives, the importance of adaptability cannot be overstated. From the moment we wake up, we interact with devices that have become extensions of ourselves. Smartphones, tablets, and laptops are the gateways to information, connecting us to the vast digital realm. The rapid evolution of these technologies challenges us to keep pace, and this dynamic landscape demands constant learning and flexibility.

            At the same time, amidst the digital chaos, the allure of nature and simplicity remains undiminished. The soothing rustle of leaves in a forest, the majesty of a mountain range, and the beauty of a starry night sky offer respite from the digital deluge. Balancing our tech-savvy lives with a touch of nature has become essential for our well-being.',
            'user_id' => 2,
            'created_at'=> Carbon::now(),

        ]);


        DB::table('categories')->insert([
            'name' => 'login',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        
        
        ]);

        DB::table('categories')->insert([
            'name' => 'vacancy',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        
        
        ]);

        
        DB::table('faqs')->insert([
            'question' => 'Mijn login werkt niet.',
            'answer' => 'Kijk in jouw inbox bij ongewenste e-mails',
            'category_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        
        
        ]);

        DB::table('faqs')->insert([
            'question' => 'Mijn login werkt nog niet.',
            'answer' => 'Herstuur de verificatie mail.',
            'category_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Mijn vacuture werkt nog niet.',
            'answer' => 'Klik op de knop submit',
            'category_id' => 2,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }


}
