<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 2:51 AM
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\category;
class CateController extends Controller
{
    public function getAdd()
    {   
        $parent = category::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.add',compact('parent'));
    }
    public function postAdd(CateRequest $request){
        $cate = new category;
        $cate->name         = $request->txtCateName;
        $cate->alias        = $request->txtAlias;
        $cate->order        = $request->txtOrder;
        $cate->parent_id    = $request->sltParent;
        $cate->description  = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Category']);
    }
    public function getEdit()
    {
        return view('admin.cate.edit');
    }

    public function getList()
    {   
        $data = category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.cate.list',compact('data'));
    }
    public function getDelete(){

    }
    public function postEdit(){
        
    }

}