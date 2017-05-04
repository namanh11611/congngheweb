<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 3:29 AM
 */

namespace App\Http\Controllers;


use App\category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

use App\LogPrice;
use App\Product;
use Auth;
use App\ProductImages;
use Input, File;
use Request;

class ProductController extends Controller
{
    public function getAdd()
    {
        $cate = category::select('name', 'id', 'parent_id')->get()->toArray();
//        dump($cate);
        return view('admin.product.add', compact('cate'));
    }

    public function postAdd(ProductRequest $request)
    {
        $fileName = $request->file('fImages')->getClientOriginalName();
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->description = $request->txtDescription;
        $product->price = $request->txtPrice;
        $product->image = $fileName;
        $product->quantity = $request->txtQuantity;
        $product->cate_id = $request->sltParent;

//        echo "";
//        dump($product);

//        echo base_path();
        $request->file('fImages')->move('..\resources\upload',$fileName);
        $product->save();
//        return redirect()->route('admin.product.list')->with(['flash_level'=>'success' ,'flash_message'=>'Success !! Complete Add Product']);
    }

    public function getEdit()
    {
        return view('admin.product.edit');
    }

    public function getList()
    {
        return view('admin.product.list');
    }
}