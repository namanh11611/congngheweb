<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Provider;
use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{
    public function getList(){
        $data = Provider::select('id', 'name_provider', 'address', 'phone_number')->orderBy('id', 'ASC')->get()->toArray();
        return view('admin.provider.list', compact('data'));
    }

    public function getAdd(){
        return view('admin.provider.add');
    }

    public function postAdd(ProviderRequest $request){
        $provider = new Provider();
        $provider->name_provider = $request->txtProviderName;
        $provider->address = $request->txtProviderAddress;
        $provider->phone_number = $request->txtPhoneNumber;
        $provider->save();
        return redirect()->route('admin.provider.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Add Provider']);
    }

    public function getEdit($id){

    }

    public function postEdit($id){

    }

    public function getDelete($id){

    }
}
