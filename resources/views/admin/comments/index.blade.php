
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
                        <h6 class="text-white text-capitalize ps-3">Comments table :  <span class="ms-5 text-sm "> {{$comments->count()}}  /  {{\App\Models\Comment::all()->count()}}  </span></h6>

                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <p class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment  </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reply?  </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">author </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">body</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div> {{$comment->id}}</div>

                                        </div>

                                    </td>
                                    <td>

                                            <p> @if($comment->parent_id === null ) comment @else reply to {{$comment->parent_id }}@endif</p>

                                    </td>
                                    <td> <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-xs text-secondary mb-0"><span class="text-secondary text-xs font-weight-bold"><a class="link-info"
                                                                                                                                             href="{{route('users.show', $comment->user->id)}}">{{$comment->user->username}}</a></span></h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="badge badge-sm  text-secondary text-xxs font-weight-bold">{{$comment->body}}</span>
                                    </td>


                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$comment->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$comment->updated_at->diffForHumans()}}</span></td>

                                    <td class="align-end">
                                        <form class="d-flex align-content-end" action="{{route('comments.update', $comment->id)}}" method="POST">

                                            @csrf
                                            @method('PATCH')
                                            @if($comment->is_active == 1)
                                                <input type="hidden" name="is_active" value="{{$comment->is_active}}">
                                                <button href="{{route('comments.update', $comment->id)}}" type="submit" data-toggle="tooltip" data-placement="top" class="btn text-success">
                                                    <i class="fa fa-unlock"></i>
                                                </button>
                                            @else
                                                <input type="hidden" name="is_active" value="{{$comment->is_active}}">
                                                <button   type="submit"  class="btn text-danger mr-1">
                                                    <i class="fa fa-lock"></i>
                                                </button>
                                            @endif
                                            <a class="btn text-warning" type='submit'
                                               href="{{route('blogpost', $comment->post)}} "><i
                                                    class="fa fa-eye mt-3"></i></a>
<!--
                                            <a href="{{route('comments.show', $comment->id)}}" class="btn text-success pt-3 mr-1">Full Discussion <i class="material-icons ">arrow_right_alt</i></a>
-->

                                        </form>
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
        {{$comments->render()}}

    </div>
@endsection

