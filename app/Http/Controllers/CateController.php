<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 2:51 AM
 */

namespace App\Http\Controllers;


class CateController extends Controller
{
    public function getAdd()
    {
        return view('admin.cate.add');
    }

    public function getEdit()
    {
        return view('admin.cate.edit');
    }

    public function getList()
    {
        return view('admin.cate.list');
    }
}