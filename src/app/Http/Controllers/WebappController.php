<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebappController extends Controller
{
    public function index()
    {
        return view('webapp.index');
    }
}
