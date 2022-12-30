<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Sell_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sells = Sell::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('atendant.sells.index', compact('sells'));
    }

    public function indexFinal()
    {
        //
        $sells = Sell::where('status',0)->orderBy('created_at','desc')->get();
        return view('atendant.sells_final.index', compact('sells'));
    }

    public function indexFinalAdmin()
    {
        //
        $sells = Sell::where('status',0)->orderBy('created_at','desc')->get();
        $last = Sell::orderBy('id','desc')->first('updated_at');
        return view('admin.sells-final.index', compact('sells','last'));
    }

    public function fetchdata(){

        $sells = Sell::where('status','!=',0)->orderBy('created_at','desc')->get();
        return response()->json(
            $sells
        );
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
        // dd($request->all());
        // GUARDA A VENDA E RETORNA ID
        $data1 = $request->validate([
            'total'=>'required',
            'delivery_tax' => 'required',
            'number' => 'required'
        ]);

        $data = $request->all();

        $sub = Sell::orderBy('id','desc')->first();
        
        $string = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);
        $string2 = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);

        if($sub == null){
            $id = 1;
            $ref = 'INHVC'.date('ym').$string2.$id.$string;
        }else{
            $id = $sub->id+1;
            $ref = 'INHVC'.date('ym').$string2.$id.$string;
        }

        $phonenumber = '258'.$data['number'];

        $config = \abdulmueid\mpesa\Config::loadFromFile('config.php');
            $transaction = new \abdulmueid\mpesa\Transaction($config);
            $amount=$data['total'];
            $msisdn = $phonenumber;
            $reference = $ref;
            $third_party_reference = $ref;
        
            try {
                //code...
                $c2b = $transaction->c2b(
                    // $amount,
                    1,
                    $msisdn,
                    $reference,
                    $third_party_reference
                );
            } catch (\Throwable $th) {
                //throw $th;
                
                return redirect('/myorder')->with('messageError', $th->getMessage());
            }

            if($c2b->getCode() === 'INS-0') {

                $id = Sell::create([
                    'user_id' => $data['user_id'],
                    'total' => $data['total'],
                    'payment' => $data['payment'],
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
                return redirect('/myorder')->with('message', 'Sua ordem foi efectuada com sucesso, acompanhe o progresso aqui!');

            }

            if($c2b->getCode() === 'INS-1') {

                return redirect('/myorder')->with('messageError', 'Erro interno, volte a tentar novamente');

            }

            if($c2b->getCode() === 'INS-2') {
                //API INVALIDA
                return redirect('/myorder')->with('messageError', 'Erro interno, volte a tentar novamente');

            }

            if($c2b->getCode() === 'INS-4') {
                //API INVALIDA, USUARIO NAO ATIVO
                return redirect('/myorder')->with('messageError', 'Erro interno, volte a tentar novamente');

            }

            if($c2b->getCode() === 'INS-5') {
                //API INVALIDA, USUARIO CANCELOU
                return redirect('/myorder')->with('messageError', 'Transação cancelado pelo usuário');

            }

            if($c2b->getCode() === 'INS-6') {
                //API INVALIDA, Transaçãp falhou
                return redirect('/myorder')->with('messageError', 'Transação falhou');

            }

            if($c2b->getCode() === 'INS-9') {
                //API INVALIDA, REQUEST TIMEOUT
                return redirect('/myorder')->with('messageError', 'O tempo expirou. Volte a tentar');

            }

            if($c2b->getCode() === 'INS-10') {
            
                return redirect('/myorder')->with('messageError', 'Transação duplicada');

            }
            if($c2b->getCode() === 'INS-16') {
            
                return redirect('/myorder')->with('messageError', 'Erro interno volte mais tarde');

            }

            if($c2b->getCode() === 'INS-2006') {
            
                return redirect('/myorder')->with('messageError', 'Saldo insuficiente');

            }

            if($c2b->getCode() === 'INS-2051') {
            
                return redirect('/myorder')->with('messageError', 'Número de telefone inválido');

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
    public function update(Request $request, Sell $sell)
    {
        //
        // dd($request->all());
        $data = $request->all();
        $sell->update($data);
        return back()->with('message','Estado alterado com sucesso');
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
    public function invoice(Sell $sell){

        $pdf = PDF::loadView('atendant.invoice', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }

    public function invoiceAdmin(Sell $sell){

        $pdf = PDF::loadView('admin.invoice', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }
}
