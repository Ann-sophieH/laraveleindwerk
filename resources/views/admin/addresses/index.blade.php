@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @if(Session::has('user_message'))
            <p class="alert alert-info">{{session('user_message')}}</p>
        @endif
    </div>
    <div class="row">

        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Adresses table</h6>
<!--                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{url('admin/users/create')}}" class="text-white text-center ps-2"> Add user</a>

                            </div>
                        </button>-->

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
                            <a href="{{route('users.show', $address->user->id)}}">
                                <h6 class="mb-3 text-sm link-success"> {{$address->user->first_name}} {{$address->user->last_name}}</h6>
                            </a>

                            <span class="mb-2 text-xs">Name recipient: <span class="text-dark font-weight-bold ms-sm-2">{{$address->name_recipient}}</span></span>
                            <span class="mb-2 text-xs">Address line 1 : <span class="text-dark ms-sm-2 font-weight-bold">{{$address->addressline_1}}</span></span>
                            <span class="text-xs">Address line 2 : <span class="text-dark ms-sm-2 font-weight-bold">{{$address->addressline_2}}</span></span>
                        </div>
                        <div class="ms-auto text-end">
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
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
