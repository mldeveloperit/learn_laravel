<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i<10; $i++) {
            $title = $faker->sentence();

            DB::table('articles')->insert([
                'user_id' => $faker->numberBetween(1,10),
                'title' => $title,
                'slug' => str_slug($title),
                'body' => $faker->text(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
