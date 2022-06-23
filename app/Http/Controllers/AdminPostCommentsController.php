<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //passing the user because i want specific responses
        $user = Auth::user();
        $this->authorize('viewAny', $user);

        //$comments = Comment::with([ 'user','post','childcomments' ])->whereNull('parent_id')->paginate(10);
        $comments = Comment::with([ 'user','post','childcomments' ])->paginate(10);
       // $comments = Comment::with(['user', 'post'])->latest()->paginate(10);
        return view('admin.comments.index', compact( 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //created from frontend

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
        if($user = Auth::user()){
            $comment = new Comment() ;
            $comment->post_id = $request->post_id;
            $comment->body = $request->body;
            $comment->user_id = $user->id;
            $request->post_id
                ? $comment->parent_id = $request->parent_id
                : $comment->parent_id = NULL;

           $comment->save();
            Session::flash('postcomment_message', 'Message submitted and awaits moderation');
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
      //  $replies = Comment::with([ 'user','post','childcomments' ])->where('parent_id', $id)->paginate(10);

        // $comments = Comment::with(['user', 'post'])->latest()->paginate(10);
        //return view('admin.comments.show', compact( 'replies'));
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

        $comment = Comment::findOrFail($id);
        if($comment){
            $comment->is_active = !$request->is_active;
            $comment->save();
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
