<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $this->authorize('viewAny', $user);

        $posts = Post::with(['photos', 'category', 'user'])->withTrashed()->filter(request(['search']))->paginate(30); //
        $categories = Category::all();

        return view('admin.posts.index', compact( 'posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = Auth::user();
        $this->authorize('create', $user);

       $categories = Category::all();
        return view('admin.posts.create', compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required'
        ], $messages = [
            'title.required'=>'Title is required',
            'categories.required'=>'Category name is required',
            'photo_id.required'=>'Adding a photo required',
            'body.required'=>'a body text is required'
        ]
        );
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($post->title, '-');
        $post->body_long = $request->body_long;
        $post->body_short = $request->body_short;
        $post->category_id = $request->category_id;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug ;
        if( $request->sticky){
            $post->sticky = $request->sticky;
        }else{
            $post->sticky = 0;
        }
        if ($request->blockquote){
            $post->blockquote = $request->blockquote;
        }
        $post->user_id = Auth::user()->id;
        /**wegschrijven post table**/
        $post->save();

        /**code opslaan blogpost foto's  **/
        $files = $request->file('photos');
        if($request->hasfile('photos')){
            foreach( $files as $file){
                $name = time() . $file->getClientOriginalName();
                Image::make($file)
                    ->resize(2650, 2650, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('/assets/img/posts/' . 'md_' . $name)); //enkel thumbnail vn product
                $mediumPost = 'posts/' . 'md_' . $name ;
                $photo = Photo::create(['file'=>$mediumPost]);
                $post->photos()->save($photo);
            }}

        /**gekozen cats wegscrhiven nr tussentabel **/
        Session::flash('post_message', $post->title . ' was created!'); //naam om mess. op te halen,

        return redirect()->route('posts.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //just go to the post in front end

       // $post = Post::findOrFail($id); //incl error en doorverwijzen ander pagina
        //return view('admin.posts.show', compact( 'post'));

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

        $categories = Category::all();


        $post = Post::findOrFail($id); //incl error en doorverwijzen ander pagina
        $this->authorize('update', $post);

        return view('admin.posts.edit', compact( 'post', 'categories'));

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
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($post->title, '-');
        $post->body_long = $request->body_long;
        $post->body_short = $request->body_short;
        if( $request->sticky){
            $post->sticky = $request->sticky;
        }else{
            $post->sticky = 0;
        }
        $post->category_id = $request->category;
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug ;
        $input = $request->all();
        $files = $request->file('photos');

        /**photo overschrijven**/
        if($request->hasfile('photos')){
            foreach( $files as $file){
                $name = time() . $file->getClientOriginalName();
                Image::make($file)
                    ->resize(2650, 2650, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    //->crop(550, 550 )
                    // ->insert(public_path('/img/watermark.png'), 'bottom-right', 20, 20) //wtermark toevoegen
                    ->save(public_path('/assets/img/posts/' . 'md_' . $name)); //enkel thumbnail vn product
                $mediumPost = 'posts/' . 'md_' . $name ;
                $photo = Photo::create(['file'=>$mediumPost]);
                $post->photos()->save($photo);
            }}
        $post->update();

       // $post->categories()->sync($request->categories, true); //eetrst alle cats wissen en overschrijvne
        Session::flash('post_message', $post->title . ' was updated!'); //naam om mess. op te halen,
        return redirect()->route('posts.index');
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
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);

        foreach($post->photos as $photo){
            if($photo ){
                unlink(public_path() . '/' .$photo->file); //fysiek weg
                $photo->delete(); //uit tabel
            }
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function restore($id){

        $post = Post::withTrashed()->findOrFail($id);

        $this->authorize('restore', $post);

        Post::onlyTrashed()->where('id', $id)->restore();
        Session::flash('post_message', 'Post was restored  !');

        return redirect('/admin/posts');
    }

}
