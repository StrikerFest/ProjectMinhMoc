<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    // index
    public function index()
    {
        
        return view('customer.cart');
    }
}
