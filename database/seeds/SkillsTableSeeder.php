<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Skills;
use Illuminate\Support\Facades\DB;
class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $skillArray = array ('Java','C','PHP','HTML-CSS','Python','C#','.NET','Ruby');

        foreach (range(1,8) as $index ){
        	DB::table('Skills')->insert([
        		'Name'=>$skillArray[$index-1]

        		]);
        }
    }
}
