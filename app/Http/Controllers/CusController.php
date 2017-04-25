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
}
