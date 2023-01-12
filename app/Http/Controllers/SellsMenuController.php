<?php

namespace App\Http\Controllers;

use App\Models\SellMenu;
use Illuminate\Http\Request;
use PDF;

class SellsMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sells = SellMenu::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('atendant.sells-menu.index', compact('sells'));
    }

    public function indexFinal()
    {
        //
        $sells = SellMenu::where('status',0)->orderBy('created_at','desc')->get();
        return view('atendant.sells_menu-final.index', compact('sells'));
    }

    public function indexFinalAdmin()
    {
        //
        $sells = SellMenu::where('status',0)->orderBy('created_at','desc')->get();
        $last = SellMenu::orderBy('id','desc')->first('updated_at');
        return view('admin.sells-menu-final.index', compact('sells','last'));
    }

    public function invoice(SellMenu $sell){

        $pdf = PDF::loadView('atendant.invoice-menu', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }

    public function invoiceAdmin(SellMenu $sell){

        $pdf = PDF::loadView('admin.invoice-menu', compact('sell'));

        return $pdf->setPaper('a5')->stream('fatura.pdf');
    }

    public function fetchdata(){

        $sells = SellMenu::where('status','!=',0)->orderBy('created_at','desc')->get();
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
    public function update(Request $request,  $id)
    {
        //
        $data = $request->all();

        $sell = SellMenu::find($id);
       
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
}
