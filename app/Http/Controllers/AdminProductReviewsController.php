<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminProductReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::with(['user', 'product'])->latest()->paginate(10);
        $user = Auth::user();
        $this->authorize('viewAny', $user);
        return view('admin.reviews.index', compact( 'reviews'));
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
        //only store reviews of logged users to avoid anon spam
           // dd($request->stars);
        $request->validate([
            'stars' => 'required|integer',
        ], $messages = [
            'stars.required' => 'please select a rating for your review',
            'stars.integer' => 'please select a rating for your review'
        ]);
        if(Auth::user()){
            $user = Auth::user();
            $data = [
                'product_id'=>$request->product_id,
                'body'=>$request->body,
                'stars'=>$request->stars,
                'user_id'=>$user->id,

                //'photo_id'=>$user->photo_id,
            ];
            Review::create($data);
            Session::flash('productreview_message', 'Review submitted and awaits moderation');
            Session::flash('review_message', 'Your review was sent our way, it will be posted after we have checked your orders! ');//put message in cart!!

        }
        return redirect()->back();
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
        $user = Auth::user();
        $this->authorize('update', $user);
        $review = Review::findOrFail($id);
        if($review){
            $review->is_active = !$request->is_active;
            $review->save();
            Session::flash('productreview_message', 'Review was set to active and will be displayed below the product');

            return redirect()->back();
        }
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
