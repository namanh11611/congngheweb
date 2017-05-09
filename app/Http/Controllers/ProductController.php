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

//        dump($product);

//        echo base_path();
        $request->file('fImages')->move('../resources/upload',$fileName);
        $product->save();
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Product']);
    }

    public function getList()
    {
        $data = Product::select('id', 'name', 'price', 'cate_id', 'quantity')->orderBy('id', 'ASC')->get()->toArray();
        return view('admin.product.list', compact('data'));
    }

    public function getDelete($id){
        $product = Product::find($id);
//        $product_detail = $product->pimages();
//        foreach ($product_detail as $value){
//            File::delete('resources/upload/detail'.$value["image"]);
//        }
        File::delete('../resources/upload/'.$product->image);
        $product->delete($id);
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success', 'flash_message'=>'Success! Complete Delete Product']);
    }

    public function getEdit($id){
        $cate = category::select('id', 'name', 'parent_id')->get()->toArray();
        $product = Product::find($id);
//        $product_img = Product::find($id)->pimages;
        return view('admin.product.edit', compact('cate', 'product'));
    }

    public function postEdit($id, Request $request){
        $product = Product::find($id);
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->description = Request::input('txtDescription');
        $product->quantity = Request::input('txtQuantity');
        $product->cate_id = Request::input('sltParent');
        $image_current = '../resources/upload/'.$product->image;
        if(!empty(Request::file('fImages'))){
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('../resources/upload/',$file_name);
            if(File::exists($image_current)){
                File::delete($image_current);
            }
        } else{
            echo "Not File";
        }
        $product->save();
//        if(!empty(Request::file('fEditImage'))){
//            foreach (Request::file('fEditImage') as $file){
//                $product_img = new ProductImages();
//                if(isset($file)){
//                    $product_img->image = $file->getClientOriginalName();
//                    $product_img->product_id = $id;
//                    $file->move('resources/upload/detail/', $file->getClientOriginalName());
//                    $product_img->save();
//                }
//            }
//        }
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success', 'flash_message'=>'Success! Complete Edit Product']);
    }
}