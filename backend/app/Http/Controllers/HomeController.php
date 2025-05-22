<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function pJM()
    {
        return view('dashboard/project-management');
    }

    public function product()
    {
        return view('app/e-commerce/admin/product');
    }

    public function addProduct()
    {
        return view('app/e-commerce/admin/add-product');
    }
}
