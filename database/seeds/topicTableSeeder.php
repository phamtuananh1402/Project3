<?php

use Illuminate\Database\Seeder;
use App\RepresentationCompany;
use Illuminate\Support\Facades\DB;

class topicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $statusArray = array('waiting', 'approved', 'declined');
        $representation_id = DB::table('representation_company')->pluck('representation_id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('topic')->insert([
                'topic_id' => $faker->ean8,
                'title' => $faker->sentence,
                'content' => $faker->sentence(4),
                'quantity' => $faker->randomDigit,
                'otherRequire' => $faker->sentence,
                'status' => $statusArray[array_rand($statusArray)],
                'representation_id' => $representation_id[array_rand($representation_id)]
            ]);
        }
    }
}
