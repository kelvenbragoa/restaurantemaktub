<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
   public function index(){
    
    return response([

        'products' => Product::inRandomOrder()->with('category:id,name')->get()

    ],200);

   }

   public function show($id){
       return response([
           'product' => Product::where('id', $id)->with('category:id,name')->get()
       ],200);
   }

   public function producthome(){
    
    return response([

        'products' => Product::inRandomOrder()->with('category:id,name')->limit(10)->get()

    ],200);

   }

   public function search($search){
    return response([
        'products' => Product::where('name','LIKE', '%'.$search.'%')->orWhere('short_description','LIKE', '%'.$search.'%')->with('category:id,name')->get()
    ],200);
   }


   public function categoryproducts($category){
    return response([
        'products' => Product::where('category_id',$category)->with('category:id,name')->get()
    ],200);
   }
   
}
