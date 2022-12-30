<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carts = Cart::where('user_id',auth()->user()->id)->where('sell_id',null)->get();
        return view('cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if (Cart::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->exists()) {
            $rec_data = Cart::where('user_id',$data['user_id'] )->where('product_id',$data['product_id'])->where('sell_id',null)->first();
            $qtd = $rec_data->qtd + $data['qtd'];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('carts')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);
              return back()->with('message','Foi aumentado a quantidade do produto, Clique para verificar');
        }else{

            Cart::create([
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id'],
                'qtd' => $data['qtd'],
                
            ]);
    
            return back()->with('message','Produto adicionado ao carrinho, Clique para verificar');
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $qtd, Cart $cart)
    {
        //
        dd($qtd);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        Cart::destroy($id);
        return back()->with('message','Item Apagado');
    }
}
