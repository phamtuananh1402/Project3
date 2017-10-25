<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Students extends Model
{

    /**
     * Use table Students
     *
     */
    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'email',
        'password',
        'semester',
        'class',
        'about_me',
        'address'

    ];

    protected $hidden = [
        'password'
    ];

    public function retrieveStudentId()
    {

        return Auth::user()->user_id;

    }

    public function addAspiration()
    {

        foreach ($_POST['name'] as $asp) {

            Aspiration::create([
                'student_id' => Auth::user()->user_id,
                'name' => $asp,
            ]);

        }
    }

    public function addCv()
    {
        $id = Students::retrieveStudentId();
        
    }

    public function gotCompany()
    {

        $checkInstructor = DB::table('instructor_company')->where('email', '=', $_POST['email'])->first();
        $insId = $checkInstructor->instructor_id;
        //representation
        $companyId = $checkInstructor->company_id;
        $representation = DB::table('representation_company')->where('company_id', '=', $companyId)->first();
        $repId = $representation->representation_id;


        DB::table('student_instructor_company')->insert([
            'student_id' => Auth::user()->user_id,
            'instructor_id' => $insId
        ]);

        DB::table('assignment')->insert([
            'student_id' => Auth::user()->user_id,
            'representation_id' => $repId,
            'company_id' => $repId,

        ]);

    }

    public function studentCv()
    {

        return $this->hasOne('App\StudentCv');

    }


    public function mark()
    {

        return $this->hasOne('App\Mark');

    }

    public function report()
    {

        return $this->hasOne('App\Report');

    }

    public function instructorCompany()
    {

        return $this->belongsTo('App\InstructorCompany');

    }

    public function company()
    {

        return $this->belongsTo('App\Company');

    }

    public function aspiration()
    {

        return $this->hasOne('App\Aspiration');

    }

    public function evaluation()
    {

        return $this->hasOne('App\Evaluation');

    }

    public function assignment()
    {

        return $this->hasOne('App\Assignment');

    }

    public function timeKeeping()
    {
        return $this->hasOne('App\TimeKeeping');

    }

    public function timeOutline()
    {
        return $this->hasOne('App\Outline');

    }

}
