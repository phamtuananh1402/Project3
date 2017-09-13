<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Students;
use App\StudentCv;
use App\Field;
use Illuminate\Support\Facades\DB;

class Student_cv_fieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $student_id = DB::table('student_cv')->pluck('student_id')->toArray();
        $field = DB::table('field')->pluck('name')->toArray();
       // $faker = Faker\Factory::create();
    	foreach (range(1,10) as $index ) {
    		$key = array_rand($student_id,1);
	    	DB::table('student_cv_field')->insert([
	    		'student_id'=>$student_id[$key],
	    		'field_name'=>$field[array_rand($field)]
	    	]);
	    	
	    }
    }
}