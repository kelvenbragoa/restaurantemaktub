<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    //
    public function update(User $user){

        $user = Auth::user();
        $data = request()->all();
        //   dd($data);

        if(request('image')){
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath ];
        }
        

        $user->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return back()->with('message','Alterações feitas com sucesso');
    }
}
