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

        <div class="form-check form-switch  ps-0">
            <input class="form-check-input ms-auto {{$user->is_active ? 'bg-success' : '' }}" type="checkbox" id="flexSwitchCheckDefault4" checked="" control-id="ControlID-6">
            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">User active</label>
        </div>
        </div>
<!-- nav tabs of template
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                            <i class="material-icons text-lg position-relative">home</i>
                            <span class="ms-1">App</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="material-icons text-lg position-relative">email</i>
                            <span class="ms-1">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="material-icons text-lg position-relative">settings</i>
                            <span class="ms-1">Settings</span>
                        </a>
                    </li>
                    <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 134px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div></ul>
            </div>
        </div>
-->
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
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Profile" aria-label="Edit Profile"></i><span class="sr-only">Edit Profile</span>
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

                            <li class="list-group-item border-0 ps-0 pt-5 text-sm"><strong class="text-dark">Primary delivery address:</strong> &nbsp;<br>
                                {{$user->addresses()->first()->name_recipient}} <br>
                                {{$user->addresses()->first()->addressline_1}} <br>
                                {{$user->addresses()->first()->addressline_2}} <br>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Platform Settings</h6>

                    </div>
                    <div class="card-body p-3">

                        <h6 class="text-uppercase text-body text-xs font-weight-bolder ">Application</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 px-0">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3" control-id="ControlID-5">
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New products and launches</label>
                                </div>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked="" control-id="ControlID-6">
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
                                </div>
                            </li>
                            <li class="list-group-item border-0 px-0 pb-0">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5" control-id="ControlID-7">
                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                                </div>
                            </li>
                        </ul>
                        <li class="list-group-item border-0 ps-0 pt-4 text-sm"><strong class="text-dark">Other delivery addresses:</strong> &nbsp;<br>

                            {{$user->addresses()->first()->name_recipient}} <br>
                            {{$user->addresses()->first()->addressline_1}} <br>
                            {{$user->addresses()->first()->addressline_2}} <br>
                        </li>
                        <button class="btn">
                            <a href="{{route('addresses.create')}}" class="text-center" >
                                    <i class="material-icons icon-sm pt-1">add</i> new delivery address
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

                                <img  class=" img-fluid  ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$user->username}}">
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
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="mb-5 ps-3">
                    <h6 class="mb-1">Products</h6>
                    <p class="text-sm">Recently bought items (need relation with orders) </p>
                </div>
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <p class="mb-0 text-sm">Project #id</p>
                                <a href="javascript:;">
                                    <h5>
                                        Modern name
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Description As Uber works through a huge amount of internal management turmoil.
                                </p>

                                    <button type="button" class="btn btn-primary opacity-6 btn-sm mb-0" control-id="ControlID-8">View product</button>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <p class="mb-0 text-sm">Project #1</p>
                                <a href="javascript:;">
                                    <h5>
                                        Scandinavian
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Music is something that every person has his or her own specific opinion about.
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" control-id="ControlID-9">View Project</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <p class="mb-0 text-sm">Project #3</p>
                                <a href="javascript:;">
                                    <h5>
                                        Minimalist
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Different people have different taste, and various types of music.
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" control-id="ControlID-10">View Project</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">
                            <div class="card-header p-0 mt-n4 mx-3">
                                <a class="d-block shadow-xl border-radius-xl">
                                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <p class="mb-0 text-sm">Project #4</p>
                                <a href="javascript:;">
                                    <h5>
                                        Gothic
                                    </h5>
                                </a>
                                <p class="mb-4 text-sm">
                                    Why would anyone pick blue over pink? Pink is obviously a better color.
                                </p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" control-id="ControlID-11">View Project</button>
                                    <div class="avatar-group mt-2">
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Peterson">
                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Nick Daniel">
                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ryan Milly">
                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                        </a>
                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Elena Morison">
                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
