<?php

namespace App\Http\Controllers\Auth;

use App\Users;
use App\Members;
use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Hash;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getRegister(){
        return view('user.pages.register');
    }

    public function postRegister(RegisterRequest $request){
        $user = new Users();
        $customer = new Customers();
        $member = new Members();
        $username = $request->txtUser;
        $password = Hash::make($request->txtPass);
        $email = $request->txtEmail;
        $level = 3;

        $first_name = $request->txtFirstName;
        $last_name = $request->txtLastName;
        $phone_number = $request->txtPhoneNumber;
        $address = $request->txtAddress;

        $customer->firs_name = $first_name;
        $customer->last_name = $last_name;
        $customer->phone_number = $phone_number;
        $customer->address = $address;

        $user->username = $username;
        $user->password = $password;
        $user->email = $email;
        $user->level = $level;

        $user->save();
        $customer->save();

        $newUser = Users::where('username','=',$username)->first();
        $newCustomer = Customers::where('phone_number','=',$phone_number)->first();
        
        $member->customer_id = $newCustomer["id"];
        $member->user_id = $newUser["id"];

        $member->save();

        return view('user.pages.regsuccess');
    }
}
