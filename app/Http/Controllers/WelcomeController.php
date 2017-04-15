<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 18-Mar-17
 * Time: 9:55 AM
 */
namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        //echo "Welcome";
        return view('user.pages.home');
    }
}