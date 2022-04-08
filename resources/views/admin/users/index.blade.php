@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-10 mx-auto d-flex justify-content-around">
@foreach($roles as $role)

        <div class="card col-2">
            <a href="{{route('admin.usersPerRole', $role->id)}}">
            <div class="card-header mx-4 p-3 text-center">
                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
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
                                            <h6 class="mb-0 text-sm">{{$user->username}}</h6>
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
                                               href="{{url('admin/users/show', $user->id)}} "><i
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
@endsection

