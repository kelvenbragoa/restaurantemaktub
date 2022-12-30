<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AtendantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $atendant = User::where('role_id',2)->orderBy('id','desc')->get();
        $last = User::orderBy('id','desc')->where('role_id',2)->first('updated_at');
        return view('admin.atendant.index', compact('atendant','last'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.atendant.create');
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
        ]);

        $data = $request->all();

       

        if (User::where('email', $data['email'])->exists()) {
            return back()->with('messageError', 'Existe um usuário registrado com este email!');
        }
        $data['password'] = bcrypt($request->password);
        $imageArray = ['image'=> 'profile/default.png' ];
        
        User::create(array_merge(
            $data,
            $imageArray
        ));
        
        return back()->with('messageSuccess','Atendente salvo com sucesso');
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
    public function edit(User $atendant)
    {
        //
        return view('admin.atendant.edit',compact('atendant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $atendant)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
       
        $atendant->update($data);
        return back()->with('messageSuccess','Alterações feitas com sucesso');
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
