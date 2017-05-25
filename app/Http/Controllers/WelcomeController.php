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
use DB, Cart , Mail;
use Illuminate\Http\Request;
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
        $product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(30)->get();
        $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(4)->get();
        //echo "Welcome";
        if(Auth::check()){
            return view('user.pages.home',compact('product','lasted_product'))->with('userLogined',Auth::user());
            View::share('userLogined',Auth::user());
        }
        return view('user.pages.home',compact('product','lasted_product'));
    }
    public function loaisanpham($id){
        $cate = DB::table('category')->select('parent_id')->where('id',$id)->first();
        if($cate->parent_id == 0){
            $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
            $menu_cate = DB::table('category')->select('id','name','alias')->where('parent_id',$id)->get();
            $name_cate = DB::table('category')->select('name')->where('id',$id)->first();
            $cateOfProduct = DB::table('category')->select('id')->where('parent_id',$id)->get();
            $product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$cateOfProduct[0]->id)->paginate(5);

            if (Auth::check()){
                return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'))->with('userLogined',Auth::user());
            }
                return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'));
        }
    	$product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->get();
        if(count($product_cate) == 0){
            $cate = DB::table('category')->select('parent_id')->where('id',$id)->first();
        }else{
            $cate = DB::table('category')->select('parent_id')->where('id',$product_cate[0]->cate_id)->first();
        }
        $product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id);
        $product_cate = $product_cate->paginate(10);
        
    	$menu_cate = DB::table('category')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
    	$name_cate = DB::table('category')->select('name')->where('id',$id)->first();
    	$lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
        if (Auth::check()){
            return view('user.pages.cate',compact('product_cate','menu_cate','lasted_product','name_cate'))->with('userLogined',Auth::user());
        }
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
        // dd($total1);
        // echo 1;die;
        return view('user.pages.shopping',compact('content','total1'));
    }
    public function xoasanpham ($id){

        Cart::remove($id);
        if(Auth::check()){
            return redirect()->route('giohang')->with('userLogined',Auth::user());
        }
        return redirect()->route('giohang');
    }
    public function capnhat($id, $qty, Request $request){
    
    }
    public function checkout(){
        $content = Cart::content();
        $total1 = Cart::total();
        return view('user.pages.checkout', compact('content','total1'));
    }
    public function get_lienhe(){
        return view('user.pages.contact');
    }
    public function post_lienhe(Request $request){
        // dd($request->all());
        $data = ['hoten'=>$request->name,'tinnhan'=>$request->messages,'email'=>$request->email];
        Mail::send('emails.blanks',$data,function($msg) use ($request){
            $msg->from('hieutm.bk@gmail.com','Minh Hieu');
            $msg->to($request->email,$request->hoten)->subject('Đây là Mail từ E-Shopping');

        });
        echo "<script>
            alert('Cám ơn bạn đã góp ý. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất');
            window.location = '".url('/')."'
        </script>";
    }

}