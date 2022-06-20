<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Addresstype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $addresses = Address::with(['users'])->withTrashed()->filter(request(['search']))->paginate(25);
        return view('admin.addresses.index', compact('addresses', 'users' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('admin.addresses.create', compact('user') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add validation?
        $address = new Address();
        $address->name_recipient = $request['name_recipient'];
        $address->addressline_1 = $request['addressline_1'];
        $address->addressline_2 = $request['addressline_2'];
        $address->address_type = $request['address_type'];
        $address->save();
        $address->users()->sync($request['user_id'], true);
        Session::flash('address_message', 'address for '. $address->name_recipient . ' was saved!');

        return redirect('/admin/addresses');
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
        $address = Address::findOrFail($id);
        $address_type = Addresstype::findOrFail($address->address_type);
        return  view('admin.addresses.edit', compact('address', 'address_type'));

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
        $address=  Address::findOrFail($id);
        $address->name_recipient = $request['name_recipient'];
        $address->addressline_1 = $request['addressline_1'];
        $address->addressline_2 = $request['addressline_2'];
        $address->address_type = $request['address_type'];
        $address->update();

        Session::flash('address_message', 'address for '. $address->name_recipient . ' was edited!');
        return redirect('/admin/addresses/');
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
        $address = Address::findOrFail($id);
        Session::flash('address_message', 'this address was was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC
        $address->delete();
        return redirect()->back();
    }
    public function restore( $id){
        Address::onlyTrashed()->where('id', $id)->restore();
        Session::flash('address_message','this address was restored and is active again !'); //naam om mess. op te halen, VOOR DELETE OFC

        return redirect('/admin/addresses');
    }
}
