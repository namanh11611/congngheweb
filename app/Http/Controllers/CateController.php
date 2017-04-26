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
        // echo "hellowo";
        $parent = category::select('id','name','parent_id')->get()->toArray();
        // var_dump($parent);
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
        return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add category']);
      }
    public function getEdit($id)
    {
        $data = category::findOrFail($id)->toArray();
 
         $parent = category::select('id','name','parent_id')->get()->toArray();
        return view('admin.cate.edit',compact('parent','data','id'));
    }

    public function getList()
    {
       $data = category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
        return view('admin.cate.list',compact('data'));
    }
    public function getDelete($id){
        $parent = category::where('parent_id',$id)->count();
         if($parent == 0){
              $cate = category::find($id);
         $cate->delete($id);
         return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complate Delete category']);
     }else{
         echo "<script type='text/javascript'>
             alert('Sorry ! You can not delete this category');
             window.location = ' ";
                echo route('admin.cate.list');
                 echo"';
         </script>";
 
     }
 }

    public function postEdit(Request $request,$id){
       $this->validate($request,
                 ["txtCateName"=>"required"],
                 ["txtCateName.required"=>"Please Enter Name category"]
             );  
             $cate = category::find($id);
             $cate->name         = $request->txtCateName;
             $cate->alias        = $request->txtAlias;
             $cate->order        = $request->txtOrder;
             $cate->parent_id    = $request->sltParent;
             $cate->description  = $request->txtDescription;
             $cate->save();
              return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit category']);
    }
}