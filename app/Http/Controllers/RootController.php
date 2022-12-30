<?php

namespace App\Http\Controllers;
use App\Models\Sell;
use App\Models\Category;
use App\Models\Local_Delivery;
use App\Models\Product;
use App\Models\Settings;
use Illuminate\Http\Request;
use PDF;

class RootController extends Controller
{
    //
    public function index(){
        // $post = DB::table('posts')->where('status','=',1)->limit(3)->orderByDesc('id')->get();
        $categories= Category::orderBy('name','asc')->get();
        // $courses= DB::table('courses')->where('status',1)->orderByDesc('name')->get();
        $products1 = Product::where('status',1)->where('is_deleted',0)->inRandomOrder()->limit(3)->get();
        $products2 = Product::where('status',1)->where('is_deleted',0)->inRandomOrder()->limit(3)->get();

        $settings = Settings::find(1);

        $locals = Local_Delivery::get();

        $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();
        
        return view('welcome',compact('categories','products1','products2','locals','dish_day'));
    }

    public function product(){
       
        
           
            // $products = Product::paginate(9);
            $products = Product::where('status',1)->where('is_deleted',0)->inRandomOrder()->paginate(9);
            return view('product',compact('products'));
/*
            if($data == []){
        }else{
            $products = null;
            $search = @$data['search'];
            $productsearch = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->where('long_description', 'LIKE', "%{$search}%")->where('status',1)->paginate(9);

            return view('product',compact('productsearch','products'));
            // dd($search);
        }*/
       
        
        
    }

    public function search(Request $request){
        $data = $request->all();

        $search = $data['search'];
        $products = Product::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->where('long_description', 'LIKE', "%{$search}%")
        ->where('status',1)
        ->where('is_deleted',0)
        ->paginate(9);

        return view('search',compact('products','search'));

    }

    public function addCart(Product $product){
        $rel_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        return view('addcart',compact('product','rel_products'));
    }

    public function myorder(){

        $order = Sell::where('user_id',auth()->user()->id)->get();
        
        return view('myorder',compact('order'));
    }

    public function clientinvoice($id){
        $sell = Sell::find($id);

        $pdf = PDF::loadView('atendant.invoice', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }

    public function category($category){
        
        $products = Product::where('category_id',$category)->where('status',1)->where('is_deleted',0)->get();
        return view('category-product',compact('products'));
        
    }


}
