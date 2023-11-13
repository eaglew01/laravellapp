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
        
        DB::table('roles')->insert([
            'slug' => 'administrator',
            'name' => 'administrator',
            'permissions' => '{"platform.systems.attachment":"1","platform.systems.roles":"1","platform.systems.users":"1","platform.index":"1"}',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 1,
            'birthday' => Carbon::createFromFormat('d/m/Y', '14/02/1989')->format('Y-m-d'),
            'aboutME' => 'Ik ben de admin account die verplicht werd toegevoegd.',
            'image' => '7309681.jpg',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
            'permissions' => '{"platform.systems.roles":true,"platform.systems.users":true,"platform.systems.attachment":true,"platform.index":true}'
        
        ]);

        DB::table('users')->insert([
            'name' => 'eaglew',
            'email' => 'wouterdecleer@hotmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_admin' => 0,
            'birthday' => Carbon::createFromFormat('d/m/Y', '14/02/1989')->format('Y-m-d'),
            'aboutME' => 'Ik ben de admin account van de Laravel developer',
            'image' => '8309183.png',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        
        ]);


        DB::table('vacancies')->insert([
            'title' => 'Dit is vacature 1',
            'body' => 'In a world where technology continues to shape our lives, the importance of adaptability cannot be overstated. From the moment we wake up, we interact with devices that have become extensions of ourselves. Smartphones, tablets, and laptops are the gateways to information, connecting us to the vast digital realm. The rapid evolution of these technologies challenges us to keep pace, and this dynamic landscape demands constant learning and flexibility.

            At the same time, amidst the digital chaos, the allure of nature and simplicity remains undiminished. The soothing rustle of leaves in a forest, the majesty of a mountain range, and the beauty of a starry night sky offer respite from the digital deluge. Balancing our tech-savvy lives with a touch of nature has become essential for our well-being.',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
                  ]);

        DB::table('vacancies')->insert([
            'title' => 'Dit is vacature 2',
            'body' => 'In a world where technology continues to shape our lives, the importance of adaptability cannot be overstated. From the moment we wake up, we interact with devices that have become extensions of ourselves. Smartphones, tablets, and laptops are the gateways to information, connecting us to the vast digital realm. The rapid evolution of these technologies challenges us to keep pace, and this dynamic landscape demands constant learning and flexibility.

            At the same time, amidst the digital chaos, the allure of nature and simplicity remains undiminished. The soothing rustle of leaves in a forest, the majesty of a mountain range, and the beauty of a starry night sky offer respite from the digital deluge. Balancing our tech-savvy lives with a touch of nature has become essential for our well-being.',
            'user_id' => 2,
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),

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

        DB::table('categories')->insert([
            'name' => 'unknown',
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
