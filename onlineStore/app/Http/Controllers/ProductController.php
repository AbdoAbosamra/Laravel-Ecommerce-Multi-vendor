<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $viewData =[];
        $viewData['title'] = "Products - Online Store";
        $viewData['subtitle'] = "List of Products";
        $viewData['products'] = Product::all(); // self not ProductController
        return view('product.index')->with("viewData" ,$viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product['name'] ."Online Store";
        $viewData["subtitle"] = $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with('viewData' , $viewData);
    }
}