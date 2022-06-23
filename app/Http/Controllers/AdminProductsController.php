<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsEditRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
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
        $categories = Category::all();
        $products = Product::with(['specifications', 'colors', 'category', 'photos'])->withTrashed()->filter(request(['search']))->paginate(15);
       // Session::flash('product_message', 'these are all the products found in database!');
        $specs = Specification::whereNotNull('parent_id')->with( 'childspecs')->get();
        $product = null;
        return view('admin.products.index', compact('products', 'specs', 'categories', 'product'));
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
        $colors = Color::all(); //see all knop maken!!
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $product = null; // simply so i can use same sub_specs_filter in create as i used in edit.blade
        return view('admin.products.create', compact('colors', 'specs' , 'categories', 'product'));

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
        //@dd($request);
        $product = new Product();
        $product->name = $request->name;
        $product->details = $request->details;
        $product->slug = Str::slug($product->name, '-');

        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->save();
        /**photo opslaan**/
        $files = $request->file('photos');
       // dd($request->file('photos') );
        if($request->hasfile('photos')){
            foreach( $files as $file){
                $name = time() . $file->getClientOriginalName();
                Image::make($file)
                    ->resize(2650, 2650, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    //->crop(550, 550 )
                    // ->insert(public_path('/img/watermark.png'), 'bottom-right', 20, 20) //wtermark toevoegen
                    ->save(public_path('assets/img/products/' . 'md_' . $name)); //enkel thumbnail vn product
                $mediumProduct = 'products/' . 'md_' . $name ;
                $photo = Photo::create(['file'=>$mediumProduct]);
                $product->photos()->save($photo);
            }}

     /*   if($file = $request->file('photos')){
            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(720, 720, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->crop(550, 550)
                ->save(public_path('assets/img/products/' . 'th_' . $name));
            $thumbnail = 'products/' . 'th_' . $name ;
            $photo =  Photo::create(['file'=>$thumbnail]);
        }*/
        //dd($request->specifications);
        $product->colors()->sync($request->colors,false);

        $product->specifications()->sync($request->specifications,false);
        Session::flash('product_message', 'A new product was added!');

        return redirect('admin/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //see page details frontend
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

        $product = Product::findOrFail($id);
        $user = User::findOrFail($id);
        $this->authorize('update', $product, $user);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $colors = Color::all();

        return view('admin.products.edit', compact('product','specs','categories', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsEditRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();
        /** edit many-relationships **/
        $product->colors()->sync($request->colors, true);
        $product->specifications()->sync($request->specifications, true);

        /** update photo **/
        $files = $request->file('photos');
        if($request->hasfile('photos')){
            foreach( $files as $file){
                $name = time() . $file->getClientOriginalName();
                Image::make($file)
                    ->resize(720, 720, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    //->crop(550, 550 )
                    // ->insert(public_path('/img/watermark.png'), 'bottom-right', 20, 20) //wtermark toevoegen
                    ->save(public_path('assets/img/products/' . 'md_' . $name)); //enkel thumbnail vn product
                $mediumProduct = 'products/' . 'md_' . $name ;
               // $product->update($input);

                $photo = Photo::create(['file'=>$mediumProduct]);
                $product->photos()->save($photo);
            }
        }



        $product->update($input);
        Session::flash('product_message', 'Product: ' . $product->name . ' was edited!');
        return redirect('/admin/products');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        //need to cascade delete something here?
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product, $user);

        Session::flash('product_message', $product->name . ' was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC


        $product->delete();
        return redirect('/admin/products');
    }
    public function restore($id){
        Product::onlyTrashed()->where('id', $id)->restore();
        Session::flash('product_message', 'Product was restored  !');

        return redirect('/admin/products');
    }
    public function productsPerCat($id){
        $user = Auth::user();

        $this->authorize('viewAny', $user);
        $categories = Category::all();
        //$specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
     //   $product = null;
        $products = Product::where('category_id' , $id)->with(['colors', 'photos', 'specifications'])->paginate(25);
        return view('admin.products.index', compact('categories', 'products'));

    }


        /** FRONTEND CODE can be deleted now**/
    /*public function products(){
        $products = Product::with(['photos', 'colors'])->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();

        return view('products', compact('products', 'specs', 'categories'));
    }*/
 /*   public function speakers(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 2)->get();

        return view('speakers', compact('products', 'specs', 'categories', 'types'));
    }
    public function speakersPerType($id){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 2)->get();
        $products = Type::findOrFail($id)->products()->with(['photos', 'colors'])->where('category_id' , 2)->paginate(25);

        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();

        return view('speakers', compact('products', 'types', 'specs', 'categories'));

    }
    public function headphones(){
        $products = Product::with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        $types = Type::where('category_id' , 1)->get();
        return view('headphones', compact('products', 'specs', 'categories', 'types'));
    }
    public function headphonesPerType($id){
        //all speakers (cat 2) where type id = $id
        $types = Type::where('category_id' , 1)->get();
        $products = Type::findOrFail($id)->products()->with(['photos', 'colors'])->where('category_id' , 1)->paginate(25);

        $categories = Category::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        return view('headphones', compact('products', 'types', 'specs', 'categories'));

    }*/

    /*public function cart(){

        return view('cart');
    }*/
}
