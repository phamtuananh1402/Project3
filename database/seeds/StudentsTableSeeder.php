<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Students;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the students table seeds.
     *
     * @return void
    
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index ){
        	DB::table('students')->insert([
        		'first_name'=> $faker->firstName,
        		'last_name'=>$faker->lastName,
        		'date_of_birth'=>$faker->DateTime,
        		'student_id'=>$faker->ean8,
        		'gender'=>$faker->boolean,
        		'phone_number'=>$faker->randomDigit,
        		'email'=> $faker->email,
        		'semester'=>$faker->randomDigit,
        		'class'=>$faker->sentence

        		]);
        }
       // $this->call(StudentsTableSeeder::run());
    }
}