<?php

namespace App\Http\Controllers;

use App\Events\UsersSoftDelete;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $this->authorize('viewAny', $user);

        $roles = Role::all();

        $users = User::with(['photos', 'roles', 'addresses'])->withTrashed()->filter(request(['search']))->paginate(25);
       // Session::flash('user_message', 'these are all the users found in the database!');

        return view('admin.users.index', compact('users', 'roles')); //COMPACT draagt assoc array over nr indexpagina met users in
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

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        /** save user **/
        $user = new User();
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;

        $user->password = Hash::make($request['password']);
        $user->is_active = $request->is_active;
        /**code opslaan foto **/
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(850, 850, function ($constraint){//520
                    $constraint->aspectRatio();
                })
                //->crop(320, 320 )
                ->save(public_path('assets/img/users/' . 'th_' . $name));//file nodig = temporary file of pc
            $thumbnail = 'users/' . 'th_' . $name ;
            $photo = Photo::create(['file'=>$thumbnail]);
            $user->photo_id = $photo->id;
        }
        $user->save();
        if($request->hasfile('photo_id')){
            $user->photos()->save($photo);
        }

        /** save roles **/
        $user->roles()->sync($request->roles, false);
        /** save address **/

        $address = new Address();
        $address->name_recipient = $request['name_recipient'];
        $address->addressline_1 = $request['addressline_1'];
        $address->addressline_2 = $request['addressline_2'];
       // $address->address_type = 1; standard
        $address->save();
        $user->addresses()->sync($address->id, false);
        Session::flash('user_message', 'A new user was added!');
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //detailpage user
       // $orderdetails = [];
        //Session::flash('user_message', 'Here is all the info we have on ' . $user->username );
        $this->authorize('view', $user);
        $orders = Order::with('user', 'orderdetails', 'orderdetails.product')->where('user_id' , $user->id)->latest()->get();

        return view('admin.users.show', compact('user', 'orders'));

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

        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $roles = Role::pluck('name', 'id')->all();
        $user_address = $user->addresses->first();//change to delivery adr

        return view('admin.users.edit' , compact('user', 'roles', 'user_address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);
        if(trim($request->password)==''){
            $input = $request->except('password');
        }else{
            $input = $request->all;
            $input['password'] = Hash::make($request['password']);
        }
        /** code picture save **/
        if($file = $request->file('photo_id')){
            /** delete old user picture upon update to keep things clean users only need 1 **/
            if($user->photos() === true){
                $pivot = $user->photos()->where('photoable_id' == $id && 'photoable_type' == 'App\Models\User');//getting pivot table
                $pivot->detach(); //deletes from photoables
                $oldPhoto = Photo::where('id', $user->photo_id)->first();//getting photo
                unlink($oldPhoto->file);//delete locally
                $oldPhoto->delete($oldPhoto);//delete from DB
            }

            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(520, 520, function ($constraint){
                    $constraint->aspectRatio();
                })
                //->crop(320, 320 )
                ->save(public_path('assets/img/users/' . 'th_' . $name)); //file nodig = temporary file of pc
            $thumbnail = 'users/' . 'th_' . $name ;
            $photo = Photo::create(['file'=>$thumbnail]);

            $user->photo_id = $input['photo_id'] = $photo->id ; //id ophalen van de foto die net is opgeladen
            //eerst oude foto weer verwijderen how?
            $user->update($input);

            $user->photos()->save($photo);

        }
        $user->update($input);

        /** adding to pivot roles**/
        $user->roles()->sync($request->roles, true);
        /** adding to address table **/
        $address = $user->addresses->where('address_type', 1)->first();
        if($address){
            $address->update([  'name_recipient' =>  $request['name_recipient'],
                'addressline_1' => $request['addressline_1'],
                'addressline_2' => $request['addressline_2'],
                'address_type' => 1,

            ]);
        }

        Session::flash('user_message', $user->username . ' was edited!');
        return redirect('/admin/users');
    }
    public function changestatus(Request $request, $id){
        $user = User::findOrFail($id);
        if($user){
            $user->is_active = !$request->is_active;
            $user->save();
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
        $user = User::findOrFail($id);
        $this->authorize('delete', $user);

        Session::flash('user_message', $user->username . 'was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC
        UsersSoftDelete::dispatch($user);
        $user->delete();
        return redirect('/admin/users');
    }
    public function restore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect('/admin/users');
    }
    public function usersPerRole($id){
        $roles = Role::all();
        $users = Role::findOrFail($id)->users()->with('photos', 'roles')->paginate(15);

        Session::flash('user_message', 'Here are all the users with this role: '); //naam om mess. op te halen, VOOR DELETE OFC

        return view('admin.users.index', compact('users', 'roles'));

    }
}
