<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $data = ['message' => 'Hello from Laravel!'];
        return view('tester', compact('data'));
    }
}
