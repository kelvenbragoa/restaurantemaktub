<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index($userid){
        
        return response([
    
            'cart' => Cart::with('product:name,price,id,image')->where('user_id',$userid)->where('sell_id',null)->get()
    
        ],200);
    
       }

       public function store(Request $request){

        $data = $request->all();
        if (Cart::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->exists()) {
            $rec_data = Cart::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->first();
            $qtd = $rec_data->qtd + $data['qtd'];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('carts')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);

              return response([
                'message' => 'Foi acrescentada a quantidade do seu produto',
                
            ], 200);
        }else{

            Cart::create([
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'qtd' => $data['qtd'],
                
            ]);
    
            return response([
            'message' => 'Produto adicionado com sucesso',
            
        ], 200);
        }
       }

       public function destroy($id,$userid){
        $cart = Cart::find($id);

        if(!$cart)
        {
            return response([
                'message' => 'Produto não encontrado'
            ], 403);
        }

        if($cart->user_id != $userid)
        {
            return response([
                'message' => 'Permissão negada.'
            ], 403);

        }

      
        Cart::destroy($id);

        return response([

            'message' => 'Produto apagado'
        ], 200);
        
    }
       
}
