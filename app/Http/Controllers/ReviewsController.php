<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Review;
class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $review = Review::get();
        $n = $review->count();

        $t = $n * 5;

        if($n == 0){
            $mfood = Review::sum('food') / 1;
            $mservice =Review::sum('service')/ 1;
            $mpontual =Review::sum('pontual')/ 1;
            $mprice =Review::sum('price')/ 1;
        }else{
            $mfood = Review::sum('food') / $n;
            $mservice =Review::sum('service')/ $n;
            $mpontual =Review::sum('pontual')/ $n;
            $mprice =Review::sum('price')/ $n;
        }

        

        $totalsoma = Review::sum('food') +Review::sum('service')+Review::sum('pontual')+Review::sum('price');
       
        
        if($t == 0){
            $average = $totalsoma/1;
        }else{
            $average = $totalsoma/$t;
        }
        
        // $total = Review::sum('food');
        return view('all-review',compact('review','average','mfood','mservice','mpontual','mprice'));
        
    }

    public function indexAdmin(){
        $reviews = Review::orderBy('id','desc')->get();
        $last = Review::orderBy('id','desc')->first('updated_at');
        return view('admin.review.index',compact('reviews','last'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sell_id)
    {
        //
        
        return view('review',compact('sell_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        // dd($data);
        if(request('image')){
            $imagePath = request('image')->store('review','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        Review::create([
            'user_id'=> $data['user_id'],
            'sell_id'=> $data['sell_id'],
            'review' => $data['review'],
            'food' => $data['food'],
            'service' => $data['service'],
            'pontual' => $data['pontual'],
            'price' => $data['price'],
            'image' => $imagePath ?? 'category/default.png'
        ]);
        return redirect('/all-reviews')->with('message', 'Comentário feito com sucesso');
        
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
    public function update(Review $review)
    {
        //
        $data = request()->all();
        $review->update($data);
        return back()->with('message','Respondido o comentário');

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
