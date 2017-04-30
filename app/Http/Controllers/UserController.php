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
use App\Members;
use App\Customers;
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
        $customer = new Customers();
        $member = new Members();
        $username = $request->txtUser;
        $password = Hash::make($request->txtPass);
        $email = $request->txtEmail;
        $level = $request->rdoLevel;

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

        

        //return view('admin.user.add');
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