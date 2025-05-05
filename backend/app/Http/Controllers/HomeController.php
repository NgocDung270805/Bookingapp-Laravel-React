<?php

namespace App\Http\Controllers;

abstract class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
