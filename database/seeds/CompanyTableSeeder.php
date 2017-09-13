<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,5) as $index ){
        	DB::table('Company')->insert([
        		'Company_id'=> $faker->ean8,
        		'Company_name'=>$faker->lastName,
        		'Address'=>$faker->address,
        		'Information'=>$faker->sentence

        		]);

        }
    }
}
