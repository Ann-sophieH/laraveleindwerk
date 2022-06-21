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

<div class="card card-body mx-3 mx-md-4 mt-5">
    <div class="row gx-4 mb-2">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative ">
                @if(($user->photos)->isNotEmpty())
                    @foreach($user->photos as $photo)

                        <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$user->username}}">
                    @endforeach
                @else
                    <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$user->username}}">

                @endif            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    {{$user->first_name}} {{$user->last_name}}
                </h5>
                <div class="d-flex ">
                    @foreach($user->roles as $role)
                        <p class="mb-0 font-weight-normal text-sm">
                            <span class="badge badge-sm text-xxs bg-gradient-faded-success ms-1"> {{$role->name}}</span>
                        </p>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">

            <form class="d-flex" action="{{route('users.status', $user->id)}}" method="POST">
                @csrf
                @method('POST')
                @if($user->is_active === 1)

                    <input type="hidden" name="is_active" value="{{$user->is_active}}">
                    <button href="{{route('users.status', $user->id)}}" type="submit" data-toggle="tooltip" data-placement="top" class="btn btn-outline-success text-success" >

                        <i class="fas fa-running" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Deactivate user" aria-label="Deactivate user"></i><span class="sr-only">Deactivate user</span> active user
                    </button>
                @else
                    <input type="hidden" name="is_active" value="{{$user->is_active}}">
                    <button   type="submit"  class="btn btn-outline-danger text-danger">
                       <span class="material-icons">
                    person_off
                       </span> deactivated user
                    </button>
                @endif
                 </form>

        </div>

    </div>
    <div class="row">
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{route('users.edit', $user->id)}}">
                                    <i class="fas fa-user-edit text-warning fs-4 " data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Profile" aria-label="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username:</strong> &nbsp; {{$user->username}} </li>

                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$user->first_name}} {{$user->last_name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp;{{$user->telephone}} </li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user->email}} </li>
                            @foreach($user->addresses->where('address_type', 1)->take(1) as $delivery_address)
                                <h6 class="text-uppercase text-dark text-xs font-weight-bolder pt-5">Delivery address</h6>

                                <li class="list-group-item border-0 ps-0  text-sm">
                                {{$delivery_address->name_recipient}} <br>
                                {{$delivery_address->addressline_1}} <br>
                                {{$delivery_address->addressline_2}} <br>
                                @if($delivery_address->deleted_at != null)
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('addresses.restore',$delivery_address->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
                                @else
                                <form method="POST"
                                      action="{{action("App\Http\Controllers\AdminAddressesController@destroy", $delivery_address->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                </form>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Other addresses </h6>

                    </div>
                    <div class="card-body p-3">


                        @foreach($user->addresses->where('address_type', 2) as $billing_address)
                            <h6 class="text-uppercase text-dark text-xs font-weight-bolder ">Billing address</h6>

                            <li class="list-group-item border-0 ps-0  text-sm">
                                {{$billing_address->name_recipient}} <br>
                                {{$billing_address->addressline_1}} <br>
                                {{$billing_address->addressline_2}} <br>
                                @if($billing_address->deleted_at != null)
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('addresses.restore',$billing_address->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
                                @else
                                <form method="POST"
                                      action="{{action("App\Http\Controllers\AdminAddressesController@destroy", $billing_address->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                </form>
                                @endif
                        </li>

                        @endforeach
                        <button class="btn">
                            <a href="{{route('addresses.create', $user->id)}}" class="text-center" >
                                    <i class="material-icons icon-sm pt-1">add</i> billing/delivery address
                            </a>
                        </button>

                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">User picture(s)</h6>

                    </div>
                    <div class="row row-cols-4 g-2 mt-2">
                        @if(($user->photos)->isNotEmpty())
                            @foreach($user->photos as $photo)
                                <div class="d-flex">
                                <form method="post" action="{{route('photos.destroy', $photo)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  text-danger" type="submit"><i
                                            class="fa fa-close "></i></button>
                                </form>
                                <img  class=" img-fluid  ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$user->username}}">
                                </div>
                            @endforeach
                        @else
                            <img  class=" img-fluid  ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$user->username}}">

                        @endif
                    </div>
                    <div class="list-group-item border-0 pb-0 mt-4 ps-3">
                        <strong class="text-dark text-sm">Socials:</strong> &nbsp;
                        <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                    {{--@foreach($user->addresses as $billing_address)
                        @if($loop->iteration >= 3)
                            <li class="list-group-item border-0 ps-0 pt-5 text-sm"><strong class="text-dark">other addresses:</strong> &nbsp;<br>
                                {{$billing_address->name_recipient}} <br>
                                {{$billing_address->addressline_1}} <br>
                                {{$billing_address->addressline_2}} <br>
                                @if($billing_address->deleted_at != null)
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{route('addresses.restore',$address->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
                                @else
                                <form method="POST"
                                      action="{{action("App\Http\Controllers\AdminAddressesController@destroy", $billing_address->id)}}">
                                @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit"><i class="material-icons text-xxs me-2">delete</i>Delete</button>
                                </form>
                                @endif
                            </li>
                        @endif
                    @endforeach--}}
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="mb-5 ps-3">
                    <h6 class="mb-1">Products</h6>
                    <p class="text-sm">Recently bought items  </p>
                </div>
                <div class="row mb-2">
                    @foreach ($orders->take(2) as $order )
                        @foreach ($order->orderdetails->take(4) as $item )
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">

                                    @if(($item->photos) != null)
                                        @foreach($item->photos as $photo)
                                            <img alt="{{$item->name}}" class=" img-fluid shadow border-radius-xl" src="{{asset($photo->file) }}">

                                        @endforeach
                                    @else
                                        <img  class=" img-fluid shadow border-radius-xl" src="http://via.placeholder.com/400x200" alt="{{$item->name}}">

                                    @endif
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <p class="mb-0 text-sm">Order # {{$order->id}} </p>
                                <a href="javascript:;">
                                    <h5>
                                        {{$item->product->name}}
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    {{$item->product->details}}
                                </p>

                                <a
                                    href="{{route('details', $item->product)}} ">  <button type="button" href="{{route('details', $item->product)}} " class="btn btn-primary opacity-6 btn-sm mb-0" control-id="ControlID-8"> <i
                                            class="fa fa-eye mt-3"></i> View product</button>
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
