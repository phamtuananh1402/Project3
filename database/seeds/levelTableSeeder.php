<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Level;
use Illuminate\Support\Facades\DB;

class levelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levelArray = array ('Beginer','Professional','Intermediate', 'Advanced','Fluent');

        foreach (range(1,5) as $index ){
        	DB::table('Level')->insert([
        		'Name'=>$levelArray[$index-1]

        		]);
        }
    }
}
