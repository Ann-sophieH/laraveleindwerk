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

{{--    topcards user--}}
<div class="container-fluid py-4">


<div class="row py-4  p-0 m-0">
    <div class="col-10 mx-auto d-flex justify-content-around">
        <div class="card col-2">
            <a href="{{route('users.index')}}">
                <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-faded-warning shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                </div>
                <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">All users</h6>
                    <hr class="horizontal dark ">
                    <span class="text-xs">See all users without filters</span>
                    <p>add active users toggle here!!</p>
                </div>
            </a>
        </div>
@foreach($roles as $role)

        <div class="card col-2">
            <a href="{{route('admin.usersPerRole', $role->id)}}">
            <div class="card-header mx-4 p-3 text-center">
                <div class="icon icon-shape icon-lg bg-gradient-faded-info shadow text-center border-radius-lg">
                    <i class="material-icons opacity-10">person</i>
                </div>
            </div>
            <div class="card-body pt-0 p-3 text-center">
                <h6 class="text-center mb-0">{{$role->name}}</h6>
                <hr class="horizontal dark ">
                <span class="text-xs">Sort users by role of {{$role->name}} </span>

            </div>
            </a>
        </div>

        @endforeach
    </div>
</div>

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Users table :  <span class="ms-5 text-sm "> {{$users->count()}}  /  {{\App\Models\User::all()->count()}}  </span></h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{url('admin/users/create')}}" class="text-white text-center ps-2"> Add user</a>

                            </div>
                        </button>

                    </div>
                </div>
                <form class="ms-5 mt-5">
                    @csrf
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deleted</th>
                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                <td>

                                    <div class="d-flex px-2 py-1">
                                        <div> {{$user->id}}</div>

                                        <div>
                                            @if(($user->photos)->isNotEmpty())
                                                @foreach($user->photos as $photo)

                                                    <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$user->username}}">
                                                @endforeach
                                            @else
                                                <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$user->username}}">

                                            @endif
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href="{{route('users.show', $user->id)}}">
                                            <h6 class="mb-0 text-sm">{{$user->username}}</h6>
                                            </a>
                                            <p class="text-xs text-secondary mb-0">{{$user->first_name}} {{$user->last_name}}</p>

                                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-sm text-xxs bg-gradient-faded-info">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm  {{$user->is_active ==1 ? 'bg-gradient-success' : 'bg-gradient-secondary'}}">{{$user->is_active ==1 ? 'active' : 'inactive'}}</span>
                                </td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$user->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$user->updated_at->diffForHumans()}}</span></td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                </td>
                                <td class="align-middle">
                                    @if($user->deleted_at != null)
                                        <a class="btn btn-warning" href="{{route('users.restore',$user->id)}}">Restore</a>
                                    @else
                                        <form method="POST"
                                              action="{{action("App\Http\Controllers\AdminUsersController@destroy", $user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn text-warning" type='submit'
                                               href="{{route('users.show', $user->id)}} "><i
                                                    class="fa fa-eye mt-3"></i></a>
                                            <a class="btn text-info" type='submit'
                                               href="{{url('admin/users/edit', $user->id)}} "><i
                                                    class="fa fa-edit mt-3"></i></a>
                                            <button class="btn  mt-2 ps-5 text-danger" type="submit"><i
                                                    class="fa fa-close "></i></button>

                                        </form>


                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-3 mx-auto mt-5">
        {{$users->render()}}
    </div>

<div class="row py-5">
    <div class="col-12 mt-4 mt-lg-0">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Reviews</h6>
            </div>
            <div class="card-body pb-0 p-3">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-0">
                        <div class="w-100">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm text-capitalize">Positive reviews</span>
                                <span class="ms-auto text-sm">80%</span>
                            </div>
                            <div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-gradient-info w-80" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="w-100">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm text-capitalize">Neutral reviews</span>
                                <span class="ms-auto text-sm">17%</span>
                            </div>
                            <div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-gradient-dark w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                        <div class="w-100">
                            <div class="d-flex mb-2">
                                <span class="me-2 text-sm text-capitalize">Negative reviews</span>
                                <span class="ms-auto text-sm">3%</span>
                            </div>
                            <div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-gradient-danger w-5" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
                <div class="w-60">
                    <p class="text-sm mb-0">
                        More than <b>1,500,000</b> developers used Creative Tim's products and over <b>700,000</b> projects were created.
                    </p>
                </div>
                <div class="w-40 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;">View all reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

