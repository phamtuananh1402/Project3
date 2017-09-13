<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Topic;
use App\StudentCv;
use App\Field;

use Illuminate\Support\Facades\DB;
class topic_fieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

  
        //
        $topic_id = DB::table('topic')->pluck('topic_id')->toArray();
        $field = DB::table('field')->pluck('name')->toArray();
       // $faker = Faker\Factory::create();
    	foreach (range(1,10) as $index ) {
    		$key = array_rand($topic_id,1);
	    	DB::table('topic_field')->insert([
	    		'topic_id'=>$topic_id[$key],
	    		'field_name'=>$field[array_rand($field)]
	    	]);

	    }
    }
}
