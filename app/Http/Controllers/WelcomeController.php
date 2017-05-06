<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 18-Mar-17
 * Time: 9:55 AM
 */
namespace App\Http\Controllers;
use DB,Cart;
use Illuminate\Support\Facades\Auth;
use View;
class WelcomeController extends Controller
{
    function __construct(){
        if(Auth::check()){
            //view()->share('userLogined',Auth::user());
            //view('user.pages.home')->with('userLogined',Auth::user());
        }else{

        }
    }

    public function index()
    {
        //Auth::logout();
        $product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        //echo "Welcome";
        if(Auth::check()){
            return view('user.pages.home',compact('product'))->with('userLogined',Auth::user());
            View::share('userLogined',Auth::user());
        }
        return view('user.pages.home',compact('product'));
    }
    public function loaisanpham($id){
    	$product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(2);
    	$cate = DB::table('category')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
    	$menu_cate = DB::table('category')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
    	$name_cate = DB::table('category')->select('name')->where('id',$id)->first();
    	$lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
        if (Auth::check()){
            return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'))->with('userLogined',Auth::user());
        }
    	return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'));
    }
    // public function chitietsanpham($id){
    //     $product_detail = DB::table('products')->where('id',$id)->first();
    //     return view('use.pages.detail')
    // }
    // public function get_lienhe(){
    //     return view('user.pages.contact');
    // }
    // public function post_lienhe(){

    // }
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
        if(Auth::check()){
            return redirect()->route('giohang')->with('userLogined',Auth::user());
        }
        return redirect()->route('giohang');
    }
    public function capnhat(){
        if(Request::ajax()){
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id,$qtv);
            echo "oke";
        }
    }

}