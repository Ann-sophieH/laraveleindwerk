<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSpecificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //N+1 problem not solvable cause calling on products relation within page
        $specs = Specification::with([ 'products','childspecs' ])->whereNull('parent_id')->withTrashed()->paginate(10);
        //$specs->load(['products.specifications', 'childspecs.products']);
        //$sub_specs = Specification::with([ 'products','childspecs', 'specs'])->withTrashed()->whereNotNull('parent_id')->paginate(10);


        return view('admin.specifications.index', compact('specs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //how to make up this HTML?? make second includes w checkboxes and input type hidden w parent id
        $colors = Color::all();
        $specs = Specification::whereNull('parent_id')->with( 'childspecs', 'products')->get();
        $categories = Category::all();
        return view('admin.products.create' , compact('specs', 'colors', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required'
        ]);
        $specification = new Specification();
        $specification->name = $request->name;
        $specification->parent_id = $request->parent_id;
        $specification->save();
        Session::flash('spec_message', $specification->name . ' was stored!'); //naam om mess. op te halen, VOOR DELETE OFC

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
        $specification = Specification::findOrFail($id);
       // $childSpecs = Specification::whereNotNull('parent_id')->with([ 'childspecs'])->get(); //childspecs
        return view('admin.specifications.edit', compact('specification'));
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
        $request->validate([
            'name' => 'required',
        ]);
        $spec = Specification::findOrFail($id);
        $spec->name = $request->name;
        $spec->update();
        Session::flash('spec_message', $spec->name . ' was edited and saved!'); //naam om mess. op te halen, VOOR DELETE OFC

        return redirect('/admin/specifications/');
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
        $specification = Specification::findOrFail($id);
        Session::flash('spec_message', $specification->name . ' was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC
        $specification->delete();
        return redirect()->back();
    }
    public function restore( $id){
        Specification::onlyTrashed()->where('id', $id)->with('products')->restore();
        Session::flash('spec_message', 'this specification was restored and is active again!'); //naam om mess. op te halen, VOOR DELETE OFC

        return redirect('/admin/specifications');
    }
}
