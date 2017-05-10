<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_output;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Treat_Order;
use DB;
use App\Http\Requests\OrderOutRequest;

class OrderOutController extends Controller
{
    public function getList(){
        $order = Order_output::orderBy('id', 'ASC')->where('status', '<>', 'Canceled')->get()->toArray();
        return view('admin.orderout.list', compact('order'));
    }

    public function getTreat($id){
        $order = OrderOutput::find($id);
        $customer = Customer::find($order->customer_id);
        $detail = DB::table('order_outputs')->where('order_outputs.id', $id)
            ->join('order_out_products', 'order_outputs.id', '=', 'order_out_products.orderout_id')->get();
        $list_post_office = DB::table('post_offices')->get();
//        echo '<pre>';
//        print_r($product);
//        echo '</pre>';
        return view('admin.orderout.edit', compact('order', 'customer', 'detail', 'list_post_office'));
    }

    public function postTreat($id, OrderOutRequest $request){
        //thay doi trang thai hoa don ra
        $order = OrderOutput::find($id);
        $order->status = 'Processing';
        $order->save();
        //them du lieu vao bang xu ly
        $treat_order = new Treat_Order();
        $treat_order->user_id = 1;
        $treat_order->post_office_id = $request->sltPostOffice;
        $treat_order->orderout_id = $id;
        $treat_order->save();
        return redirect()->route('admin.orderout.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Treat Order']);
    }

    public function getCanceled($id){
        //them san pham vao kho
        $detail = DB::table('order_outputs')->where('order_outputs.id', $id)
            ->join('order_out_products', 'order_outputs.id', '=', 'order_out_products.orderout_id')->get();
        foreach ($detail as $item_detail){
            $product = Product::select()->where('id', $item_detail->product_id)->first();
            $product->quantity += $item_detail->quantity;
            $product->save();
        }
        //thay doi trang thai hoa don
        $order = OrderOutput::find($id);
        $order->status = 'Canceled';
        $order->save();
        return redirect()->route('admin.orderout.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Canceled Order']);
    }

    public function getCompleted($id){
        //chuyen trang thai hoa don la da tra
        $order = OrderOutput::find($id);
        $order->status = 'Completed';
        $order->save();
        return redirect()->route('admin.orderout.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Completed Order']);
    }

    public function getReturn($id){
        $order = OrderOutput::find($id);
        $order->status = 'Return';
        $order->save();
        return redirect()->route('admin.orderout.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Return Order']);
    }
}
