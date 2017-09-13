<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\representation_company;
use App\Company;
use Illuminate\Support\Facades\DB;
class representation_companyTableSeeder extends Seeder
{       
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();
         $company_id = DB::table('Company')->pluck('company_id')->toArray();

        foreach (range(1,6) as $index ){
        	DB::table('representation_company')->insert([
        		'Representation_id'=>$faker->ean8,
        		'First_name'=> $faker->firstName,
        		'Last_name'=>$faker->lastName,
        		'phone_number'=>$faker->e164PhoneNumber,
        		'email'=> $faker->email,
        		//'password'=>$faker->unique()->randomDigit,
        		'position'=>$faker->sentence('representive'),
        		'company_id'=>$company_id[array_rand($company_id)]

        		]);
        }
    }
}
