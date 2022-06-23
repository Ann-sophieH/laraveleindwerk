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

    <div class="row p-0 m-0">

            <div class="col-lg-8 col-md-10 col-12 m-auto">
                <h3 class="mt-3 mb-0 text-center">Add a new User</h3>
                <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let us know more about you.</p>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">user</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">


                    {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}
                    <div class="row mx-auto">
                        <div class="col-6  mt-5 p-2 pb-3 mb-5 ">
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('username', 'Username', ['class'=>'form-label ']) !!}
                                {!! Form::text('username', null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('password', 'Password:', ['class'=>'form-label ']) !!}
                                {!! Form::password('password', ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::email('email', null ,['class' =>'form-control border']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('first_name', 'First Name', ['class'=>'form-label ']) !!}
                                {!! Form::text('first_name', null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('last_name', 'Last Name', ['class'=>'form-label ']) !!}
                                {!! Form::text('last_name', null,  ['class'=>'form-control d-block', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">

                                {!! Form::label('Select roles:  ') !!}
                                {!! Form::select('roles[]', $roles, null, ['class'=>'form-control ms-2', 'multiple' , 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)'] ) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('is_active', 'Status:') !!}
                                {!! Form::select('is_active', array(1=>'active', 0=>'not active'), 1,  ['class'=>'form-control ms-3', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)'] ) !!}
                            </div>





                        </div>
                        <div class="col-6  mt-4 pt-2 p-2 pb-3 mb-5 ">
                           <p class="text-sm">delivery address: <span class="text-muted text-lowercase ms-5 "><i > you can add billing address later</i></span></p>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('name_recipient', 'Name Recipient', ['class'=>'form-label ']) !!}
                                {!! Form::text('name_recipient', null, ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_1', 'Street + number', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_1', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('addressline_2', 'City + postalcode', ['class'=>'form-label ']) !!}
                                {!! Form::text('addressline_2', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>

                            <div class="input-group input-group-dynamic mt-3">
                                {!! Form::label('telephone', 'Phone', ['class'=>'form-label ']) !!}
                                {!! Form::text('telephone', null,  ['class'=>'form-control ', 'aria-describedby'=>'emailHelp' ,'onfocus'=>'focused(this)' , 'onfocusout'=>'defocused(this)']) !!}
                            </div>
                            <div class="input-group input-group-dynamic mt-3">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label class="form-control text-muted mb-0" for="photo_id">User profile picture (optional) </label>
                                        <input name="photo_id" type="file"
                                               class="form-control border dropzone dz-clickable" multiple
                                               id="photo_id">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create user', ['class'=>'btn bg-gradient-warning opacity-7 w-25 mx-auto mb-0  mt-5 ms-5'] ) !!}


                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
            </div>
@endsection
