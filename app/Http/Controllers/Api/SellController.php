<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Sell_detail;
use Illuminate\Support\Facades\DB;


class SellController extends Controller
{
    //
    public function index($userid){
        

        return response([
            'sells' => Sell::where('user_id',$userid)->orderBy('created_at', 'desc')->get()
        ],200);

    }

    public function store(Request $request){
        $data = $request->all();

        $id = Sell::create([
            'user_id' => $data['user_id'],
            'total' => $data['total'],
            'payment' => 'mpesa',
            'status' => 4,
            'sold' => 1,
            'delivery_tax' => $data['delivery_tax'],
        ])->id;

        // dd($id);
        // OBTEM TODO CARRINHO NULO
        $mycart = DB::table('carts')->where('user_id', $data['user_id'] )->where('sell_id',null)->get();
        
        // ADICIONA TODO CARRINHO NULO A VENDA
        foreach ($mycart as $item){
            Sell_detail::create([
                'sell_id' => $id,
                'product_id' => $item->product_id,
                'qtd' => $item->qtd,
            ]);
        }
        //Update
        // dd($id);
        // ATRIBUI VENDA A CARRINHO NULO
        DB::table('carts')->where('user_id', $data['user_id'] )->where('sell_id',null)->update(['sell_id' => $id]);
       


        return response([
            'message' => 'Sua ordem foi efectuada com sucesso. Va até a aba Minhas Compras para visualizar.',
        ],200);
    }
}
