<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 18-Mar-17
 * Time: 9:55 AM
 */
namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\InfomationRequest;
use App\OrderOutProduct;
use App\OrderOutput;
use DB, Cart;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        //echo "Welcome";
        return view('user.pages.home',compact('product'));
    }
    public function loaisanpham($id){
    	$product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(2);
    	$cate = DB::table('category')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
    	$menu_cate = DB::table('category')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
    	$name_cate = DB::table('category')->select('name')->where('id',$id)->first();
    	$lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
    	return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'));
    }
     public function chitietsanpham($id){
        $product_detail = DB::table('products')->where('id',$id)->first();
        $images = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
        $product_cate = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(4)->get();
        return view('user.pages.detail',compact('product_detail','images','product_cate'));
    }
    public function muahang($id){
        $product_buy = DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image)));

        // echo $product_buy->price;
        $content = Cart::content();
        return redirect()->route('giohang');
    }
    public function giohang(){
        $content = Cart::content();
        $total1 = Cart::total();
    
        return view('user.pages.shopping',compact('content','total1'));
    }
    public function xoasanpham ($id){

        Cart::remove($id);
        return redirect()->route('giohang');
    }
    public function capnhat(Request $request){
        dd($request->all());
        if(Request::ajax()){
            // echo "capnhat";
            // $rowId = Request::get('rowId');
            $id = Request::get('id');
            $qty = Request::get('qty');
            // echo $rowId;
            // echo "  ";
            echo $id;
            Cart::update($id,$qty);
            echo "oke";
        }
    }

}