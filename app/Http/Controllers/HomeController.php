<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Local_Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role->name == "admin"){
            $product = Product::get();
            $category = Category::get();
            $local = Local_Delivery::get();
            $sells = Sell::where('status','!=',0)->orderBy('created_at','desc')->get();
            $sellsfinal = Sell::where('status',0)->orderBy('created_at','desc')->get();
            $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();

            $graphicBar_Daily = '';

            for ($xD = 1; $xD <= 31; $xD++) {
                $usuariosedc = Sell::whereDay('created_at',$xD)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get();
                $nr = count( $usuariosedc);
                $graphicBar_Daily.="{$nr},";
            }
    
            $graphicBar_Monthly = '';
            for ($x = 1; $x <= 12; $x++) {
                $usuariosedc = Sell::whereMonth('created_at',$x)->whereYear('created_at',date('Y'))->get();
                $nr = count( $usuariosedc);
                $graphicBar_Monthly.="{$nr},";
            }

            $month_sell = Sell::whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get();
            $sum_month_sell = $month_sell->sum('total');
            $total_sell = Sell::get();
            $sum_total_sell = $total_sell->sum('total');

            $last_sell = Sell::orderBy('id','desc')->get();
            



            return view('admin.index',compact('sells','sellsfinal','product','category','local','graphicBar_Daily','graphicBar_Monthly','sum_month_sell','sum_total_sell','last_sell','dish_day'));
        }
        if(Auth::user()->role->name == "atendant"){


            $sells = Sell::where('status','!=',0)->orderBy('created_at','desc')->get();
            $sellsfinal = Sell::where('status',0)->orderBy('created_at','desc')->get();
            $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();

            $graphicBar_Daily = '';

            for ($xD = 1; $xD <= 31; $xD++) {
                $usuariosedc = Sell::whereDay('created_at',$xD)->whereMonth('created_at',date('m'))->whereYear('created_at',date('Y'))->get();
                $nr = count( $usuariosedc);
                $graphicBar_Daily.="{$nr},";
            }

            return view('atendant.index', compact('sells','sellsfinal','graphicBar_Daily','dish_day'));
        }
        if(Auth::user()->role->name == "client"){
            return view('home');
        }
    }
}
