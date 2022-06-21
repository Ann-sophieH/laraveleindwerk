@extends('layouts.admin')

@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('user_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('user_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>


        <div class="row m-0 p-0">
            <div class="col-8 mt-5">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit existing user</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
<div class="row">
                    <div class="col-11 mx-auto mt-5 p-2 pb-3 mb-5">
                        {!! Form::open(['method'=>'patch', 'action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
                        <div class="row mx-auto">
                            <div class="col-6  mt-5 p-2 pb-3 mb-5 ">
                        <div class="form-group">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username',  $user->username, ['class'=>'form-control  border' ]) !!}
                        </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'Password:') !!}
                                    {!! Form::password('password',['class' =>'form-control border']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email:') !!}
                                    {!! Form::email('email',$user->email ,['class' =>'form-control border']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('first_name', 'First Name') !!}
                                    {!! Form::text('first_name',  $user->first_name, ['class'=>'form-control  border' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('last_name','Last Name') !!}
                                    {!! Form::text('last_name',  $user->last_name, ['class'=>'form-control  border' ]) !!}
                                </div>

                        <div class="form-group">
                            {!! Form::label('Select roles: (CTRL + click multiple)') !!}
                            {!! Form::select('roles[]', $roles, $user->roles->pluck('id')->toArray(), ['class'=>'form-control  ', 'multiple'=>'multiple'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Status:') !!}
                            {!! Form::select('is_active', array(1=>'active', 0=>'not active'), $user->is_active, ['class'=>'form-control  border'] ) !!}
                        </div>

                        <div class="form-group mt-3">
                            {!! Form::label('photo_id', 'Photo:') !!}
                            {!! Form::file('photo_id',null, ['class'=>'form-control  '] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Update user', ['class'=>'btn bg-gradient-info w-25  mb-0  mt-5'] ) !!}


                        </div>

                            </div>
                            <div class="col-6  mt-2 p-2 pb-3 mb-5 ">
                                <p>primary delivery address:</p>
                                @if($user_address)
                                <div class="form-group">
                                    {!! Form::label('name_recipient', 'Name Recipient') !!}
                                    {!! Form::text('name_recipient', $user_address->name_recipient, ['class'=>'form-control  border' ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('addressline_1', 'Street + number') !!}
                                    {!! Form::text('addressline_1', $user_address->addressline_1, ['class'=>'form-control  border']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('addressline_2', 'City + postalcode') !!}
                                    {!! Form::text('addressline_2',  $user_address->addressline_2, ['class'=>'form-control  border']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::text('email', $user->email, ['class'=>'form-control  border']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telephone', 'Phone') !!}
                                    {!! Form::text('telephone',  $user->telephone, ['class'=>'form-control  border']) !!}
                                </div>

                                @endif
                            </div>
                        </div>

                        {!! Form::close() !!}
                        @if(!$user_address)
                            <button class="btn" >
                                <a href="{{route('addresses.create', $user->id)}}" class="text-center" >
                                    <i class="material-icons icon-sm pt-1">add</i> billing/delivery address
                                </a>
                            </button>
                        @endif
                    </div>
                        </div>
                </div>
                </div>
            </div>
        <div class="col-4 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">User picture </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 mx-auto my-auto row">
                    @if(($user->photos)->isNotEmpty())
                        @foreach($user->photos as $photo)

                            <img  class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$user->username}}">
                        @endforeach
                    @else
                        <img class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$user->username}}">

                    @endif
                </div>
            </div>
        </div>
            </div>
        </div>



@endsection
