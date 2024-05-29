<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user ='karem';
        // must be return response : view , json , redirect , file
        return view('Dashboard.index' , compact('user')); //compact it is a built in php function return array with the key varilabe i pass
    }
}
