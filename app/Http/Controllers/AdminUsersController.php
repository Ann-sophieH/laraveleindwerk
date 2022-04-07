<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Address;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
        //
        $roles = Role::all();

        $users = User::with(['photos', 'roles', 'address'])->withTrashed()->filter(request(['search']))->paginate(15);
        Session::flash('user_message', 'these are the users found in db!'); //naam om mess. op te halen,

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
                ->resize(520, 520, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->crop(320, 320 )
                ->save(public_path('assets/img/users/' . 'th_' . $name));//file nodig = temporary file of pc
            $thumbnail = 'users/' . 'th_' . $name ;
            $photo = Photo::create(['file'=>$thumbnail]);
            $user->photo_id = $photo->id;
        }
        $user->save();
        $user->photos()->save($photo);

        /** save roles **/
        $user->roles()->sync($request->roles, false);
        /** save address **/
        $address = new Address();
        $address->name_recipient = $request['name_recipient'];
        $address->addressline_1 = $request['addressline_1'];
        $address->addressline_2 = $request['addressline_2'];
        $address->user_id = $user->id;
        $address->save();

        Session::flash('user_message', 'A new user was added!');
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detailpagina user
        return view('admin.users.index', compact());

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
        $roles = Role::pluck('name', 'id')->all();
        $user_address = Address::where('user_id', $user->id)->get();

       //  = $user->address()->get();
        //dd($user_address);
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
        /**code opslaan foto **/
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            Image::make($file)
                ->resize(520, 520, function ($constraint){
                    $constraint->aspectRatio();
                })
                ->crop(320, 320 )
                ->save(public_path('assets/img/users/' . 'th_' . $name)); //file nodig = temporary file of pc
            $thumbnail = 'users/' . 'th_' . $name ;
            $photo = Photo::create(['file'=>$thumbnail]);

            $user->photo_id = $input['photo_id'] = $photo->id ; //id ophalen van de foto die net is opgeladen
            //eerst oude foto weer verwijderen how?
            $user->update($input);

            $user->photos()->save($photo);

        }
        $user->update($input);

        /** wegschrijven tussentabel rollen**/
        $user->roles()->sync($request->roles, true);
        /*kan dit korter? */
        $user->address()->where('user_id', $user->id);
        $address = Address::where('user_id', $user->id)
            ->update([  'name_recipient' =>  $request['name_recipient'],
                        'addressline_1' => $request['addressline_1'],
                        'addressline_2' => $request['addressline_2'],
                        'user_id'=>$user->id
            ]);
        Session::flash('user_message', $user->name . ' was edited!');
        return redirect('/admin/users');
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
        Session::flash('user_message', $user->name . 'was deleted!'); //naam om mess. op te halen, VOOR DELETE OFC

        $user->delete();
        return redirect('/admin/users');
    }
    public function restore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect('/admin/users');
    }
    public function usersPerRole($id){
        $roles = Role::all();
        $users = Role::with(['users.photos', 'users.roles'])->findOrFail($id)->users()->paginate(15);
        //EAGER loading problem not fixed


        return view('admin.users.index', compact('users', 'roles'));

    }
}
