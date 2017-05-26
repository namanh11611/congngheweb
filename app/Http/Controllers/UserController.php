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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAdd($user=null)
    {
        if(Auth::check()){
            return view('admin.user.add')->with('adminLog',Auth::user());
        }
        return view('admin.user.add');
    }

    public function getEdit($id)
    {
        $data = Users::find($id);
        if(Auth::check()){
            return view('admin.user.edit',compact('data'))->with('adminLog',Auth::user());
        }
        return view('admin.user.edit',compact('data'));
    }

    public function getList()
    {

        $user = Users::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
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

        if($user->level == 1 || $user->level == 2){
            if(Auth::check()){
            return view('admin.user.add')->with('adminLog',Auth::user());
        }
            return view('admin.user.add');
        }

        $customer->save();

        $newUser = Users::where('username','=',$username)->first();
        $newCustomer = Customers::where('phone_number','=',$phone_number)->first();
        
        $member->customer_id = $newCustomer["id"];
        $member->user_id = $newUser["id"];

        $member->save();
        if(Auth::check()){
            return view('admin.user.add')->with('adminLog',Auth::user());
        }
        return view('admin.user.add');
    }

    public function getDelete($id){
        $user = Users::find($id);
        $member = Members::where('user_id','=',$user->id)->first();
        $customer = Customers::where('id','=',$member->customer_id)->first();
        
        if(Auth::check()){
            $admin = Auth::user();
            if($admin->level == 1){
                
                $member->delete($member->id);
                $customer->delete($customer->id);
                $user->delete($id);
            }else{
                if($user->level == 3){
                    
                    $member->delete($member->id);
                    $customer->delete($customer->id);
                    $user->delete($id);
                }
                return redirect()->route('admin.user.list')->with('adminLog',Auth::user());
            }
            
        }
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

        $user = Users::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
        return view('admin.user.list',compact('user'));

    }
}