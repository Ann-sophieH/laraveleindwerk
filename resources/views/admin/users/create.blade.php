@extends('layouts.admin')

@section('content')
    <div class="col-12 mt-5">
        @include('includes.form_error')
    </div>

        <div class="row">
            <div class="col-12 mt-5">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Create new user</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">


                        {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}
                        <div class="row mx-auto">
                        <div class="col-6  mt-5 p-2 pb-3 mb-5 ">
                        <div class="form-group">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username', null, ['class'=>'form-control shadow border' ]) !!}
                        </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password:') !!}
                                {!! Form::password('password',['class' =>'form-control border']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null, ['class'=>'form-control shadow border' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name', 'Last Name') !!}
                                {!! Form::text('last_name', null, ['class'=>'form-control shadow border' ]) !!}
                            </div>
                        <div class="form-group">
                            {!! Form::label('Select roles: (CTRL + click multiple)') !!}
                            {!! Form::select('roles[]', $roles, null, ['class'=>'form-control shadow ', 'multiple'=>'multiple'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Status:') !!}
                            {!! Form::select('is_active', array(1=>'active', 0=>'not active'), 1, ['class'=>'form-control shadow border'] ) !!}
                        </div>

                        <div class="form-group mt-5">
                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id',null, ['class'=>'form-control shadow '] ) !!}
                        </div>

    </div>
    <div class="col-6  mt-5 p-2 pb-3 mb-5 ">
        <div class="form-group">
            {!! Form::label('name_recipient', 'Name Recipient') !!}
            {!! Form::text('name_recipient', null, ['class'=>'form-control shadow border' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('addressline_1', 'Street + number') !!}
            {!! Form::text('addressline_1', null, ['class'=>'form-control shadow border']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('addressline_2', 'City + postalcode') !!}
            {!! Form::text('addressline_2', null, ['class'=>'form-control shadow border']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class'=>'form-control shadow border']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telephone', 'Phone') !!}
            {!! Form::text('telephone', null, ['class'=>'form-control shadow border']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create user', ['class'=>'btn bg-gradient-warning w-25 mx-auto mb-0  mt-5 ms-5'] ) !!}


        </div>
    </div>
                        </div>

                        {!! Form::close() !!}

                </div>
                </div>

@endsection
