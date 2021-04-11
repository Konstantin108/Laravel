<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    protected function getData():array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i<10; $i++){
            $title = $faker->sentence(mt_rand(3, 10));
            $slug = \Illuminate\Support\Str::slug($title);
            $data[]=[
              'category_id'=>1,
                'title'=>$title,
                'slug'=>$slug,
                'image'=>$faker->text(mt_rand(10, 15)),
                'text'=>$faker->text(mt_rand(100, 300)),
                'theme'=>$faker->text(mt_rand(10, 11))
            ];
        }

        return $data;
    }
}
