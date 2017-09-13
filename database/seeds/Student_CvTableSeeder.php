∞<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\student_cv;
use App\Students;
use Illuminate\Support\Facades\DB;

class Student_CvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker\Factory::create();
        $student_id = DB::table('Students')->pluck('student_id')->toArray();
        $statusArray = array('Waiting', 'Not apply', 'Applied');

        foreach (range(1,count($student_id)) as $index ){
        	DB::table('student_cv')->insert([
        		'student_id'=>$student_id[$index-1],
        		'name'=> $faker->firstName,
        		'info'=>$faker->sentence,
        		'phone_number'=>$faker->ean8,
        		'email'=> $faker->email,
        		'purpose'=>$faker->sentence,
        		'other_skills'=>$faker->sentence,
                'status' =>$statusArray[array_rand($statusArray)]
        		]);
        }
    }


}
