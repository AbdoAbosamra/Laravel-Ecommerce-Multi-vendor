<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Auth::user());  ===  $request->user();
        // dd(Auth::check());  === $request->filled('user');
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData['title'] = "About us - Online Store";
        $viewData ['subtitle'] = "About us";
        $viewData ['description'] = "This is an about page ...";
        $viewData ['author'] = "Developed by : Abdelrahman ";
        return view('home.about')->with("viewData" , $viewData);
    }

}
