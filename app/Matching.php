<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matching extends Model
{
    public function matchingFull()
    {
        $matchingFull = DB::select('SELECT DISTINCT
      student_cv.student_id, student_cv.name, company.company_id, topic.topic_id, company.company_name, topic.title, topic_field.field_name,
      topic_skills.skills_name, topic_skills.level_name,representation_company.representation_id
        FROM student_cv
        JOIN student_cv_field on student_cv.student_id = student_cv_field.student_id
        JOIN student_cv_skills on student_cv_skills.student_id = student_cv_field.student_id
        JOIN topic_field on student_cv_field.field_name = topic_field.field_name
        join topic_skills on student_cv_skills.skills_name = topic_skills.skills_name
        join topic on topic_field.topic_id = topic.topic_id
        JOIN `representation_company` on topic.representation_id = representation_company.representation_id
        JOIN company on representation_company.company_id = company.company_id
        WHERE topic_skills.level_name = student_cv_skills.level_name AND topic.quantity > 0 AND student_cv.student_id NOT IN (
               SELECT student_id FROM assignment 
               
               )');

        $collection = json_encode($matchingFull);
        $collect = json_decode($collection, true);
        return $collect;
    }

    public function matchingField()
    {
        $matchingField = DB::select('SELECT DISTINCT student_cv.student_id, student_cv.name, company.company_id, company.company_name,
                                  topic.title,topic.topic_id,representation_company.representation_id, field.name as field_name
              FROM `students` join student_cv on student_cv.student_id = students.student_id
              JOIN student_cv_field on student_cv_field.student_id = student_cv.student_id
              JOIN student_cv_skills on student_cv_skills.student_id = student_cv.student_id
              join field on student_cv_field.field_name = field.name
               join topic_field on topic_field.field_name = field.name
               JOIN `topic` on topic.topic_id = topic_field.topic_id
               JOIN `representation_company` on topic.representation_id = representation_company.representation_id
               JOIN company on representation_company.company_id = company.company_id
               WHERE student_cv_field.field_name = topic_field.field_name AND topic.quantity > 0 AND student_cv.student_id NOT IN (
               SELECT student_id FROM assignment 
               
               )');

        $collection = json_encode($matchingField);
        $collect = json_decode($collection, true);
        return $collect;
    }

    public function matchingSkillLevel()
    {
        $matching = DB::select('SELECT students.*, company.*, topic.title,topic.topic_id,representation_company.representation_id
 FROM `students`
    JOIN student_cv_skills on students.student_id = student_cv_skills.student_id
    JOIN `topic_skills` on topic_skills.skills_name = student_cv_skills.skills_name
    JOIN `topic` on topic_skills.topic_id = topic_skills.topic_id
    JOIN `representation_company` on topic.representation_id = representation_company.representation_id
    JOIN company on representation_company.company_id = company.company_id
    WHERE topic_skills.level_name = student_cv_skills.level_name AND topic.quantity > 0 AND students.student_id NOT IN (
               SELECT student_id FROM assignment 
               
               )'
        );
        $collection = json_encode($matching);

        $collect = json_decode($collection, true);
        return $collect;
    }
}
