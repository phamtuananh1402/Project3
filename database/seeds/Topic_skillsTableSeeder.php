<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Topic;
use App\Skills;
use Illuminate\Support\Facades\DB;
class Topic_skillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $topic = DB::table('topic')->pluck('topic_id')->toArray();
        $skill = DB::table('skills')->pluck('name')->toArray();
        $level = DB::table('level')->pluck('name')->toArray();
       // $faker = Faker\Factory::create();
        foreach (range(1,count($topic)) as $index ) {
    	   DB::table('topic_skills')->insert([
        		'topic_id'=>$topic[array_rand($topic)],
        		'skills_name'=>$skill[array_rand($skill)],
                'level_name'=>$level[array_rand($level)]
        	]);
        }
    }
}
