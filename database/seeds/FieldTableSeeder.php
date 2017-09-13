<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Skills;
use Illuminate\Support\Facades\DB;
class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fieldArray = array ('Website Developer','IoT','Security','Mobile Developer','System Adminstrator',
      'Android','IOS','Data Engineer');

        foreach (range(1,8) as $index ){
        	DB::table('field')->insert([
        		'name'=>$fieldArray[$index-1]

        		]);
        }
    }
}
