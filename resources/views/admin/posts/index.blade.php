
@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('post_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('post_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>


    <div class="row p-0 m-0">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Posts table :  <span class="ms-5 text-sm "> {{$posts->count()}}  /  {{\App\Models\post::all()->count()}}  </span></h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{route('posts.create')}}" class="text-white text-center ps-2"> Add post</a>

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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Post  </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">category</th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">author </th>


                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">active</th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deleted</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)

                                <tr>
                                    <td>

                                        <div class="d-flex px-2 py-1">
                                            <div> {{$post->id}}</div>
                                            <div>
                                                @if(($post->photos)->isNotEmpty())
                                                @foreach($post->photos as $photo)
                                                    @if($loop->first)
                                                    <img style="height: 62px; width: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$post->name}}">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img style="height: 62px; width: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$post->name}}">

                                                @endif
                                            </div>

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-xs text-secondary mb-0">{{$post->title}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-sm @if($post->category->id === 1 ) bg-gradient-faded-info @else bg-gradient-faded-warning @endif text-secondary text-xxs font-weight-bold">{{$post->category->name}}</span>
                                    </td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><a class="link-info"
                                                href="{{route('users.show', $post->user->id)}}">{{$post->user->username}}</a></span></td>


                                    <td class="align-middle text-center">
                                          <span class="badge badge-pill text-secondary text-xs font-weight-bold @if($post->active === 1 ) bg-gradient-faded-success @else bg-gradient-faded-secondary @endif">
                                                  {{$post->active ? 'Active' : 'Not Active'}}
                                         </span>
                                    </td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$post->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$post->updated_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        @if($post->deleted_at != null)
                                            <a class="btn btn-warning" href="{{route('posts.restore',$post->id)}}">Restore</a>
                                        @else
                                            <form method="POST"
                                                  action="{{action("App\Http\Controllers\AdminPostsController@destroy", $post->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn text-warning" type='submit'
                                                   href="{{route('blogpost', $post)}} "><i
                                                        class="fa fa-eye mt-3"></i></a>
                                                <a class="btn text-info" type='submit'
                                                   href="{{route('posts.edit', $post->id)}} "><i
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
    <div class=" col-3 mx-auto">
        {{$posts->render()}}

    </div>
@endsection

