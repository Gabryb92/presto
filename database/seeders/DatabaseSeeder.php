<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Storage::deleteDirectory('public/articles');
        
        $categories = [
            ['Abbigliamento'],
            ['Arredamento'],
            ['Arte'],
            ['Automobili'],
            ['Elettronica'],
            ['Giardinaggio'],
            ['Libri'],
            ['Luxury'],
            ['Musica'],
            ['Sport'],
            ['Viaggi']
        ];

        foreach($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category[0]
            ]);
        }
    }
}
