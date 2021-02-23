<?php

use Illuminate\Database\Seeder;
use App\Image;
use Faker\Generator as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 6; $i++) { 
            $newImage = new Image();
            $newImage->alt = $faker->sentence(3);
            $newImage->link = $faker->imageUrl(640, 480, 'animals');
            $newImage->caption = $faker->sentence(10);
            $newImage->save();
        }
    }
}
