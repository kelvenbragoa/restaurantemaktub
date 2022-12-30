<?php

namespace App\Http\Controllers;

use App\Models\Local_Delivery;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\Local;

class Local_DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $last = Local_Delivery::orderBy('id','desc')->first('updated_at');
        $locals = Local_Delivery::get();
        return view('admin.locals.index', compact('locals', 'last'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.locals.create');
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

        Local_Delivery::create([
            'local' => $data['local'],
            'delivery_tax' => $data['delivery_tax'],
           
        ]);

        return back()->with('message','Local salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Local_Delivery $local)
    {
        //
        return view('admin.locals.show',compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Local_Delivery $local)
    {
        //
        return view('admin.locals.edit',compact('local'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local_Delivery $local)
    {
        //
        $data = $request->all();

       
        $local->update($data);
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
    }
}
