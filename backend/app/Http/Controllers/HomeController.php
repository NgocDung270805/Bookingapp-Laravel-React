<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function pJM(){
        return view('dashboard/project-management');
    }

    public function product(){
        return view('app/e-commerce/admin/product');
    }

    public function addProduct(){
        return view('app/e-commerce/admin/add-product');
    }

}
