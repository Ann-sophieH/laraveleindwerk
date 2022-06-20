@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('address_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('address_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>

    <div class="row m-0">

        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Adresses table</h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{url('admin/users/create')}}" class="text-white text-center ps-2"> Add user | address</a>

                            </div>
                        </button>

                    </div>
                </div>
                <form class="ms-5 mt-5">
                    @csrf
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search through streets, cities, recipient names, ..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
                <div class="card-body  pb-2">
                    @foreach($addresses as $address)
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            @if($address->users->first())
                            <a href="{{route('users.show', $address->users->first()->id)}}">
                                <h6 class="mb-3 text-sm link-success"> {{$address->users->first()->first_name}} {{$address->users->first()->last_name}}</h6>
                            </a>
                            @endif

                            <span class="mb-2 text-xs">Name recipient: <span class="text-dark font-weight-bold ms-sm-2">{{$address->name_recipient}}</span></span>
                            <span class="mb-2 text-xs">Address line 1 : <span class="text-dark ms-sm-2 font-weight-bold">{{$address->addressline_1}}</span></span>
                            <span class="text-xs">Address line 2 : <span class="text-dark ms-sm-2 font-weight-bold">{{$address->addressline_2}}</span></span>
                        </div>
                        <div class="ms-auto text-end">
                            @if($address->deleted_at != null)
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{route('addresses.restore',$address->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
                            @else
                            <form method="POST"
                                  action="{{action("App\Http\Controllers\AdminAddressesController@destroy", $address->id)}}">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                            <a class="btn btn-link text-dark px-3 mb-0" href="{{route('addresses.edit', $address->id)}}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        @endif
                        </div>
                    </li>

                    @endforeach


                    </div>
                </div>
            </div>
        </div>
    <div class="row col-3 mx-auto mt-5">
        {{$addresses->render()}}
    </div>



@endsection
