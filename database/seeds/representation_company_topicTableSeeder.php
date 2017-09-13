<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\RepresentationCompany;
use App\Topic;
use Illuminate\Support\Facades\DB;

class representation_company_topicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //$faker = Faker\Factory::create();

       $representation_id = DB::table('representation_company')->pluck('representation_id')->toArray();
       $topic = DB::table('topic')->pluck('topic_id')->toArray();
       
       foreach (range(1,count($topic)) as $index) {
         DB::table('representation_company_topic')->insert([
          		'topic_id'=>$topic[array_rand($topic)],
          		'representation_id'=>$representation_id[array_rand($representation_id)]
          	]);
       }
    }
}
