<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getLogin(){
        return view('user.pages.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'txtEmail' => 'required',
            'txtPassword' => 'required|min:3|max:32'],[
            'txtEmail.required' => 'You dont enter email',
            'txtPassword.required'=> 'You dont enter password',
            'password.min' => 'Password must more than 3 characters',
            'password.max' => 'Password must less than 32 characters'
            ]);
        if(Auth::attempt(['email'=>$request->txtEmail, 'password'=>$request->txtPassword])){
            return redirect('');
        }else{
            return redirect('login/user');
        }
    }

    public function getAdminLogin(){
        return view('admin.login');
    }

    public function postAdminLogin(Request $request){
        $this->validate($request, [
            'txtEmail' => 'required',
            'txtPassword' => 'required|min:3|max:32'],[
            'txtEmail.required' => 'You dont enter email',
            'txtPassword.required'=> 'You dont enter password',
            'password.min' => 'Password must more than 3 characters',
            'password.max' => 'Password must less than 32 characters'
            ]);
        if(Auth::attempt(['email'=>$request->txtEmail, 'password'=>$request->txtPassword])){
            return redirect('admin/user/list');
        }else{
            return redirect('login/admin');
        }
     }

     public function getLogout(){
        Auth::logout();
        return redirect('');
     }
}
