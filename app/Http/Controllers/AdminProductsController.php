<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsEditRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $products = Product::with(['specifications', 'colors', 'category', 'photos'])->withTrashed()->filter(request(['search']))->paginate(15);
        Session::flash('product_message', 'these are the products found in db!'); //naam om mess. op te halen,

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors = Color::all();
        $specifications = Specification::all();
        $categories = Category::all();
        return view('admin.products.create', compact('colors', 'specifications' , 'categories'));

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
        $product = new Product();
        $product->name = $request->name;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->category_id = $request->category;

        /**photo opslaan**/
        /*if($files = $request->file('photos')){
            foreach($files as $file){
                $name = time() . $file->getClientOriginalName();
                Image::make($file)
                    ->resize(720, 720, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    ->crop(550, 550 )
                    // ->insert(public_path('/img/watermark.png'), 'bottom-right', 20, 20) //wtermark toevoegen
                    ->save(public_path('assets/img/products/' . 'th_' . $name)); //enkel thumbnail vn product
                Photo::create(['file'=>$name]);
            }
        }*/
        if($file = $request->file('photos')){
            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(720, 720, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->crop(550, 550 )
                ->save(public_path('assets/img/products/' . 'th_' . $name));
            $thumbnail = 'products/' . 'th_' . $name ;
            $photo =  Photo::create(['file'=>$thumbnail]);
        }
        $product->save();
        $product->photos()->save($photo);

        $product->colors()->sync($request->colors,false);
        $product->specifications()->sync($request->specifications,false);
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
        $product = Product::findOrFail($id);
        $specifications = Specification::all();
        $categories = Category::all();
        $colors = Color::all();


        return view('admin.products.edit', compact('product','specifications','categories', 'colors'));
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

        /** update photo **/
        if($file = $request->file('photos')){
            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(720, 720, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->crop(550, 550 )
                ->save(public_path('assets/img/products/' . 'th_' . $name));
            $thumbnail = 'products/' . 'th_' . $name ;
            $photo =  Photo::create(['file'=>$thumbnail]);
        }
        $product->update($input);
        /** edit many-relationships **/
        $product->photos()->save($photo);
        $product->colors()->sync($request->colors, true);
        $product->specifications()->sync($request->specifications, true);



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
    public function products(){
        return view('products');
    }
}
