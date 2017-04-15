<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Mar-17
 * Time: 3:29 AM
 */

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function getEdit()
    {
        return view('admin.user.edit');
    }

    public function getList()
    {
        return view('admin.user.list');
    }
}