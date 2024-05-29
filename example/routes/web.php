<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();
    dd($jobs);
    return view('jobs',['jobs' => $jobs]);
});
Route::get('/jobs/{id}' , function ($id){
    $jobs = Job::all();


//    dd($job);
    return view('job' ,['job'=> $job]);
}) ;

// Let's Declare a new Route
Route::get('/about', function(){
//    return  ['foo' => 'bar']; // autmatically converted to json
    $greeting = "Hello From About page";
    return view('about' , ['greeting' =>$greetings]);
});

Route::get('/contact' , function (){
    return view('contact');
});
