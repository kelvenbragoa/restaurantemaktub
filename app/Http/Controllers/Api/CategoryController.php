<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index(){
    
        return response([
            'categories' => Category::orderBy('name','desc')->get()
        ],200);
    
       }

       public function show($id){

        return response([
            'products' => Product::orderBy('created_at','desc')->where('id',$id)->get()
        ],200);
       }
}
