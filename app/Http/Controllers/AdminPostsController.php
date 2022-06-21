<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        Session::flash('user_message', 'No posts found in database!');
        $posts = Post::with(['photo', 'categories', 'user'])->filter(request(['search']))->paginate(30); //


        return view('admin.posts.index', compact( 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keywords = Keyword::all();
       // $categories = Category::all();
        return view('admin.posts.create', compact( 'categories', 'keywords'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($post->title, '-');

        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        /**code opslaan blogpost foto's -> nu tijdelijk nog author photo **/
        if($file = $request->file('photo_id')){
            /**wegschrijven img folder **/
            $name = time() . $file->getClientOriginalName() ;//ophalen bestandsnaam en datum toevoegen
            $file->move('img/posts/', $name); //lokaal opslaan in map images
            /**wegschrijven photo table**/
            $photo = Photo::create(['file'=>$name]); //schrijft weg naar tabel en slaat op in $photo
            $post['photo_id'] = $photo->id; //halen id uit $photo en steken die in veld phot_id van users tabel
        }
        /**wegschrijven post table**/
        $post->save();
        /**gekozen cats wegscrhiven nr tussentabel **/
        //$post->categories()->sync($request->categories, false); //detaching: eetrst alle cats wissen en overschrijvne
        Session::flash('user_message', $post->title . ' was created!'); //naam om mess. op te halen,

        foreach ($request->keywords as $keyword) { //id's komen binnen
            $keywordfind = Keyword::findOrFail($keyword);
            $post->keywords()->save($keywordfind);//in model post methode keywords() met morphtomany
        }
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
        //

        $post = Post::findOrFail($id); //incl error en doorverwijzen ander pagina
        return view('admin.posts.show', compact( 'post'));

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
       // $categories = Category::all();

        $post = Post::findOrFail($id); //incl error en doorverwijzen ander pagina
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

        $post->body = $request->body;
        /**photo overschrijven**/
        if($file = $request->file('photo_id')){
            //ophalen oude foto eerst
            $oldImage = Photo::find($post->photo_id);// GEEN FIND OR FAIL FAIL MAGNIE
            if($oldImage){
                unlink(public_path() . $oldImage->file); //fysiek uit img direc.
                $oldImage->delete();//nooit softdelete in photo
            }
            //opslaan nieuwe foto
            $name = time() . $file->getClientOriginalName();
            $file->move('img', $name);
            $photo = Photo::create(['file'=>$name]);
            $post->photo_id = $input['photo_id'] = $photo->id;
        }
        $post->update();

       // $post->categories()->sync($request->categories, true); //eetrst alle cats wissen en overschrijvne
        Session::flash('user_message', $post->title . ' was updated!'); //naam om mess. op te halen,
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
        if($post->photo->file ){
            unlink(public_path() . $post->photo->file); //fysiek weg
            $post->photo->delete(); //uit tabel
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function post(Post $post){
        // $post =Post::findOrFail($id);
        $post->load(['postcomments.user']);
        return view('post', compact('post'));
    }
}
