<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last = Category::orderBy('id','desc')->first('updated_at');
        $categories = Category::get();
        return view('admin.categories.index', compact('categories', 'last'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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

        if(request('image')){
            $imagePath = request('image')->store('category','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $imagePath ?? 'category/default.png'
        ]);

        return back()->with('message','Categoria salva com sucesso');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $data = $request->all();

        if(request('image')){
            $imagePath = request('image')->store('category','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath ];
        }

        $category->update(array_merge(
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
        if(Product::where('category_id','=',$id)->exists()){
            return back()->with('messageError','Impossivel apagar. Esta categoria está relacionada a um ou mais produto. Apague o produto primeiro e  tente novamente.');
        }else{
            $category = Category::find($id);
            $category->delete();
            return back()->with('messageSuccess','Registro apagado com sucesso.');
        }
    }
}
