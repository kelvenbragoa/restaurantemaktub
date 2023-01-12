<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\CartMenu;
use App\Models\Category;
use App\Models\Product;
use App\Models\SellDetailMenu;
use App\Models\SellMenu;
use App\Models\Table;
use App\Models\UserMenu;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MenuDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $table = Table::find($id);

        return view('menudigital.index',compact('table'));
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
    public function update(Request $request, $id)
    {
        //
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
    }


    public function destroycart($product_id){
        CartMenu::destroy($product_id);
        return back()->with('message','Item Apagado');
    }
    public function allcategory($user_id,$table_id){

        $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();
        $categories= Category::orderBy('name','asc')->get();
        $usermenu = UserMenu::find($user_id);
        $table = Table::find($table_id);

        return view('menudigital.menu.index',compact('usermenu','dish_day','categories','table'));
    }


    public function loginusermenu(Request $request){
       

        $data = $request->all();
        $dish_day = Product::where('is_dish_day',1)->where('date_dish_day',date('Y-m-d'))->first();
        $categories= Category::orderBy('name','asc')->get();
        
        $table = Table::find($data['table']);
       
        $test = UserMenu::where('mobile',$data['mobile'])->first();

        if($test == null){
            $usermenu = UserMenu::create($data);
            
            return view('menudigital.menu.index',compact('usermenu','dish_day','categories','table'));

        }else{
            $usermenu = UserMenu::where('mobile',$data['mobile'])->first();
            $usermenu->update([
                'name' => $data['name']
            ]);
            
            return view('menudigital.menu.index',compact('usermenu','dish_day','categories','table'));
        }
    }

    public function showcategory($user_id,$table_id,$category_id){
        $table= Table::find($table_id);
        $usermenu = UserMenu::find($user_id);
        $category = Category::find($category_id);
        $products = Product::where('category_id',$category_id)->orderBy('name','asc')->paginate(9);

        return view('menudigital.menu.show',compact('category', 'products', 'usermenu','table'));
    }


    public function storecart(Request $request){

        
        $data = $request->all();
        
        if (CartMenu::where('user_menu_id',$data['user_menu_id'] )->where('product_id',$data['product_id'])->where('sell_menu_id',null)->exists()) {
            $rec_data = CartMenu::where('user_menu_id',$data['user_menu_id'] )->where('product_id',$data['product_id'])->where('sell_menu_id',null)->first();
            $qtd = $rec_data->qtd + $data['qtd'];
            // dd($qtd);
            //  update($qtd,$rec_data->id );
            DB::table('cart_menus')
              ->where('id', $rec_data->id )
              ->update(['qtd' => $qtd]);
              return back()->with('message','Foi aumentado a quantidade do produto, Clique para verificar');
        }else{

            CartMenu::create([
                'user_menu_id' => $data['user_menu_id'],
                'product_id' => $data['product_id'],
                'qtd' => $data['qtd'],
                
            ]);
    
            return back()->with('message','Produto adicionado ao carrinho, Clique para verificar');
        }
    }


    public function cart($user_id,$table_id){

        $usermenu = UserMenu::find($user_id);
        $table = Table::find($table_id);
        $carts = CartMenu::where('user_menu_id',$user_id)->where('sell_menu_id',null)->get();
        return view('menudigital.menu.cart',compact('carts', 'usermenu','table'));
    }

    public function sellmenu(Request $request){

        $data = $request->all();
        $sum_total = 0;
        $mycart = CartMenu::where('user_menu_id', $data['user_menu_id'] )->where('sell_menu_id',null)->get();
        foreach ($mycart as $item) {
            
            $sum_total = $sum_total + ($item->product->price * $item->qtd);

        }
        $id = SellMenu::create([
            'user_menu_id' => $data['user_menu_id'],
            'total' =>  $sum_total,
            'table_id' => $data['table_id'],
            'status' => 2,
            'payment' => 1,  
        ])->id;

        

        foreach ($mycart as $item){
            SellDetailMenu::create([
                'sell_menu_id' => $id,
                'product_id' => $item->product_id,
                'qtd' => $item->qtd,
            ]);
        }

        DB::table('cart_menus')->where('user_menu_id', $data['user_menu_id'] )->where('sell_menu_id',null)->update(['sell_menu_id' => $id]);
        
        return redirect('/menudigital/'.$data['user_menu_id'].'/user/'.$data['table_id'].'/table/allorders')->with('message', 'Sua ordem foi efectuada com sucesso, acompanhe o progresso aqui!');
    }

    public function allorders($user_id,$table_id){
        $usermenu = UserMenu::find($user_id);
        $table = Table::find($table_id);
        $order = SellMenu::where('user_menu_id',$user_id)->get();
        
        return view('menudigital.menu.myorder',compact('order','usermenu','table'));
    }


    public function clientinvoice($sell_menu_id){

        $sell = SellMenu::find($sell_menu_id);

        $pdf = PDF::loadView('menudigital.menu.invoice', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }
}


    