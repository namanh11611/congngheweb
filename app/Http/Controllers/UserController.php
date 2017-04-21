<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 3:29 AM
 */
namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Users;
use Hash;

class UserController extends Controller
{
    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function getEdit($id)
    {
        $data = Users::find($id);
        return view('admin.user.edit',compact('data'));
    }

    public function getList()
    {
        $user = Users::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
        //return $user;
       return view('admin.user.list',compact('user'));
    }

    public function postAdd(UserRequest $request){
        $user = new Users();
        $username = $request->txtUser;
        $password = Hash::make($request->txtPass);
        $email = $request->txtEmail;
        $level = $request->rdoLevel;

        $user->username = $username;
        $user->password = $password;
        $user->email = $email;
        $user->level = $level;

        $user->save();

        return view('admin.user.add');
    }

    public function getDelete($id){
        $user = Users::find($id);
        $user->delete($id);
        return redirect()->route('admin.user.list');
    }

    public function postEdit($id, Request $request){
        $user = Users::find($id);
        if($request->input('txtPass')){
            $this->validate($request,[
                    'txtRePass' => 'same:txtRePass'
                ],
                [
                    'txtRePass.same' => 'Two Pass Dont Match'
                ]);
            $pass = $request->input('txtPass');
            $user->password = Hash::make($pass);
        }

        $user->level = $request->rdoLevel;
        $user->email = $request->txtEmail;
        $user->save();

    }
}