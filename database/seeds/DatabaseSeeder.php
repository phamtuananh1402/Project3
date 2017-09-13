<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //chỉ seed 1 lần
        $this->call(StudentsTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(representation_companyTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(levelTableSeeder::class);
        $this->call(Student_CvTableSeeder::class);
        $this->call(FieldTableSeeder::class);
        $this->call(Student_cv_fieldTableSeeder::class);


        //seed đc nhiều lần 
        $this->call(topicTableSeeder::class);
        $this->call(Student_cv_skillsTableSeeder::class);
        $this->call(Topic_skillsTableSeeder::class);
        $this->call(topic_fieldTableSeeder::class);

        Model::reguard();
    }
}
