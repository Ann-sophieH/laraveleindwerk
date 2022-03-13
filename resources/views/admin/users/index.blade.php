@extends('layouts.admin')
@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Users table</h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{url('admin/users/create')}}" class="text-white text-center ps-2"> Add user</a>

                            </div>
                        </button>

                    </div>
                </div>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                <td>

                                    <div class="d-flex px-2 py-1">
                                        <div> {{$user->id}}</div>
                                        <div>
                                            <img style="height: 62px" class="img-thumbnail img-fluid rounded-circle ms-2 me-2" src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/62x62'}}" alt="{{$user->name}}">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="badge badge-sm bg-gradient-faded-info">{{$role->name}}</span>
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
                                    <a href="{{url('admin/users/edit', $user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Edit
                                    </a>
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
    <div class="mx-auto mt-5">
        {{$users->render()}}
    </div>
@endsection

