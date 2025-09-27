<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
