<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sell_detail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();
        $last = Product::orderBy('id','desc')->first('updated_at');
        $products = Product::where('is_deleted',0)->get();
        return view('admin.products.index', compact('products','last','dish_day'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
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
        // dd($data);
        if(request('image')){
            $imagePath = request('image')->store('product','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        Product::create([
            'name' => $data['name'],
            'short_description' => $data['short_description'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'long_description' => $data['long_description'],
            'image' => $imagePath ?? 'product/default.png'
        ]);

        return back()->with('message','Categoria salva com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $data = $request->all();

    
        if(request('image')){
            $imagePath = request('image')->store('product','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath ];
        }

        $is_dish_day = $data['is_dish_day'];

        if($is_dish_day == 1){
            Product::where('is_dish_day',1)->update(['is_dish_day'=>0]);
        }

        $product->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return back()->with('message','Alterações feitas com sucesso');
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

       /* 
        if(Sell_detail::where('product_id','=',$id)->exists()){
            return back()->with('messageError','Impossivel apagar. Este produto possui registro nas vendas. Pode desabilitar este produto na edição do produto.');
        }else{
            $product = Product::find($id);
            $product->delete();
            return back()->with('messageSuccess','Registro apagado com sucesso.');
        }*/

        $product = Product::find($id);
        $product->update([
            'is_deleted' => 1,
            'status' => 0,
        ]);

        return back()->with('messageSuccess','Registro apagado com sucesso. Para recuperar o registro verifique a lixeira!');


    }


    public function garbage(){
        $products = Product::where('is_deleted',1)->get();
        return view('admin.products.garbage', compact('products'));
    }


    public function recover(Request $request){
        $data = $request->all();
        $id = $data['product_id'];

        $product = Product::find($id);
        $product->update([
            'is_deleted' => 0,
        ]);

        return back()->with('messageSuccess','Registro recuperado com sucesso. Coloque o estado do produto como ativo para vender!');


    }
}
