<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 3:29 AM
 */

namespace App\Http\Controllers;


class ProductController extends Controller
{
    public function getAdd()
    {
        return view('admin.product.add');
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