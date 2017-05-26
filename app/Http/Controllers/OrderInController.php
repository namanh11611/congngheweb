<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order_in_product;
use App\Order_input;
use Illuminate\Http\Request;
use App\Http\Requests\OrderInRequest;
use App\Provider;
use App\Product;
use DateTime;
use Auth;

class OrderInController extends Controller
{
    public function getList(){
        $order = Order_input::orderBy('id', 'ASC')->get()->toArray();
        return view('admin.orderin.list', compact('order'));
    }

    public function getAdd(){
        $provider = Provider::select('id', 'name_provider')->get()->toArray();
        $product = Product::select('id', 'name')->get()->toArray();
        return view('admin.orderin.add', compact('provider', 'product'));
    }

    public function postAdd(Request $request){
        //add data into order input
        $orderin = new OrderInput();
        $orderin->bill_code = $request->txtOrderCode;
        $orderin->amount_payed = $request->txtAmountPayed;
        $date = new DateTime($request->txtDateIn);
        $orderin->date_input = date_format($date, 'Y-m-d');
        $orderin->user_id = Auth::id();
        $provider = Provider::where('name_provider', $request->txtProvider)->first();
        if($provider != null)
            $orderin->provider_id = $provider->id;
        $orderin->save();
        $orderin_id = $orderin->id;
        for($i = 0; $i < count($request->txtProductName); $i++){
            $detail = new OrderInProduct();
            $detail->quantity = $request->txtQuantity[$i];
            $detail->price_in = $request->txtPriceIn[$i];
            $detail->orderin_id = $orderin_id;
            $product = Product::where('name', $request->txtProductName[$i])->first();
            if($product != null) {
                $product->quantity += $request->txtQuantity[$i];
                $product->save();
                $detail->product_id = $product->id;
            }
            $detail->save();
        }
        return redirect()->route('admin.orderin.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Add Order Input']);
    }

    public function getDelete(){

    }

    public function getEdit(){

    }

    public function postEdit(){

    }
}
