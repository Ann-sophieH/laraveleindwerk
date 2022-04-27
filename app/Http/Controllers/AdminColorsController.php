<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::with(['products'])->withTrashed()->paginate(25);
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product = null;
        $colors = Color::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs')->get();
        $categories = Category::all();
        return view('admin.products.create' , compact('specs', 'colors', 'categories', 'product'));
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
        $color = new Color();
        $color->name = $request->name;
        $color->hex_value = $request->hex_value;
        $color->save();
        return redirect('/admin/products/create');
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
        $colors = Color::with(['products'])->paginate(25);
        $color = Color::findOrFail($id);
        //https://devnote.in/how-to-inline-row-editing-using-laravel/
        //https://laracasts.com/discuss/channels/livewire/this-is-a-component-you-may-like-to-use-for-inline-editing
        return view('admin.colors.edit', compact('colors', 'color'));
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
        $color = Color::findOrFail($id);
        $color->name = $request->name;
        $color->hex_value = $request->hex_value;
        $color->update();
        Session::flash('color_message', $color->name . 'was edited and saved!'); //naam om mess. op te halen, VOOR DELETE OFC

        return redirect('/admin/colors/');
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
        $colors = Color::findOrFail($id);
        Session::flash('color_message', $colors->name . 'was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC
        $colors->delete();
        return redirect()->back();
    }
    public function restore( $id){
        Color::onlyTrashed()->where('id', $id)->restore();
        return redirect('/admin/colors');
    }
}
