<?php

namespace App\Http\Controllers\Auth;

use App\Mail\FeedbackEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\RepresentationCompany;
use App\Company;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'user_id' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        Company::create([
            'company_id' => $data['user_id'] . "001",
            'company_name' => $data['user_id'],
        ]);

        RepresentationCompany::create([
            'representation_id' => $data['user_id'] . "001",
            'first_name' => $data['name'],
            'email' => $data['email'],
            'company_id' => $data['user_id'] . "001",
        ]);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_id' => $data['user_id'] . "001",
            'role' => "company",
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function mailSender(User $user)
    {

        auth()->login($user);
        \App\Mail::to($user)->send(new FeedbackEmail());
        return redirect()->home();

    }

}
