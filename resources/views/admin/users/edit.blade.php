@extends('layouts.admin')

@section('content')
    <div class="col-12 mt-5">
        @include('includes.form_error')
    </div>

        <div class="row">
            <div class="col-8 mt-5">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit existing user</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">

                    <div class="col-8 mx-auto mt-5 p-2 pb-3 mb-5">
                        {!! Form::open(['method'=>'patch', 'action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',  $user->name, ['class'=>'form-control shadow border' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $user->email, ['class'=>'form-control shadow border']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Select roles: (CTRL + click multiple)') !!}
                            {!! Form::select('roles[]', $roles, $user->roles->pluck('id')->toArray(), ['class'=>'form-control shadow ', 'multiple'=>'multiple'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Status:') !!}
                            {!! Form::select('is_active', array(1=>'active', 0=>'not active'), $user->is_active, ['class'=>'form-control shadow border'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password',['class' =>'form-control border']) !!}
                        </div>
                        <div class="form-group mt-3">
                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id',null, ['class'=>'form-control shadow '] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Update user', ['class'=>'btn bg-gradient-info w-25  mb-0  mt-5'] ) !!}


                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                </div>
            </div>
        <div class="col-4 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">User photo</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 mx-auto my-auto">
                    <img class="img-fluid img-thumbnail mt-5" src="{{$user->photo ? asset($user->photo->file) :  'http://via.placeholder.com/400'}}"></img>
                </div>
            </div>
        </div>
            </div>
        </div>



@endsection
