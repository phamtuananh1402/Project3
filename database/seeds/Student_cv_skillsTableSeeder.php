<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Students;
use App\StudentCv;
use App\Skills;
use App\Level;
use Illuminate\Support\Facades\DB;
class Student_cv_skillsTableSeeder extends Seeder
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
        $skill = DB::table('skills')->pluck('name')->toArray();
        $level = DB::table('level')->pluck('name')->toArray();
       // $faker = Faker\Factory::create();
    	foreach (range(1,10) as $index ) {
    		$key = array_rand($student_id,1);
	    	DB::table('student_cv_skills')->insert([
	    		'student_id'=>$student_id[$key],
	    		'skills_name'=>$skill[array_rand($skill)],
                'level_name'=>$level[array_rand($level)]
	    	]);
	    	
	    }
    }
}
