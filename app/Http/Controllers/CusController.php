<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customers;

class CusController extends Controller
{
    public function getAdd()
    {
        return view('admin.customer.add');
    }

    public function postAdd(CustomerRequest $request){

    	$customer = new Customers();
    	$first_name = $request->txtFirstName;
    	$last_name = $request->txtLastName;
    	$phone_number = $request->txtPhoneNumber;
    	$address = $request->txtAddress;

    	$customer->firs_name = $first_name;
    	$customer->last_name = $last_name;
    	$customer->phone_number = $phone_number;
    	$customer->address = $address;

    	$customer->save();

    	return view('admin.customer.add');
    }
    public function getList()
    {
        $customer = Customers::select('id','firs_name','last_name','phone_number', 'address')->orderBy('id','DESC')->get()->toArray();
        //return $user;
       return view('admin.customer.list',compact('customer'));
    }

    public function getEdit($id)
    {
        $data = Customers::find($id);
        return view('admin.customer.edit',compact('data'));
        //return $id;
    }

    public function getDelete($id){
        $customer = Customers::find($id);
        $customer->delete($id);
        return redirect()->route('admin.customer.list');
    }

    public function postEdit($id, CustomerRequest $request){
        $customer = Customers::find($id);

        $customer->firs_name = $request->txtFirstName;
        $customer->last_name = $request->txtLastName;
        $customer->phone_number = $request->txtPhoneNumber;
        $customer->address = $request->txtAddress;

        $customer->save();

        $customer = Customers::select('id','firs_name','last_name','phone_number', 'address')->orderBy('id','DESC')->get()->toArray();
        //return $user;
       return view('admin.customer.list',compact('customer'));

    }
}
