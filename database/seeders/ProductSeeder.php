<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categoriesIDs = DB::table('categories')->pluck('id'); //to retrive all categories

        foreach (range(1, 20) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->text(20),
                'category_id'=> $faker->randomElement($categoriesIDs),
                // 'slug' => $faker->unique()->slug,
                'description' => $faker->paragraph($nb =3),
                'price' => $faker->numberBetween($min = 100, $max = 8000),
                'sale_price' => $faker->numberBetween($min = 100, $max = 8000),
                'quantity' => $faker->numberBetween($min = 0, $max = 100),
                'image'=> $faker->imageUrl($width = 60, $height = 60),
                'created_at'=>Carbon::now(),
                'updated_at'=>now(),


            ]);
        }
    }
}
