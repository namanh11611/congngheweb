<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 3:29 AM
 */

namespace App\Http\Controllers;


use App\category;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function getAdd()
    {
        $cate = category::select('name', 'id', 'parent_id')->get()->toArray();
        return view('admin.product.add', compact('cate'));
    }

    public function postAdd(ProductRequest $request)
    {
//        $produtc = new Product
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