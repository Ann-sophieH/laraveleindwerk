@extends('layouts.admin')
@section('content')

    <div class="col-12">
        @if(Session::has('postcomment_message'))
            <p class="alert alert-info">{{session('postcomment_message')}}</p>
        @endif
    </div>
    <div class=" stretch-card mb-5">
        <div class="card">
            <div class="d-flex justify-content-between p-3 mt-4">
                <div>
                    <h4 class="card-title">Replies to this comment</h4>
                    <p class="card-description m-4"> To see all user info click on their name
                    </p>
                    <p class="card-description m-4">Display : {{$replies->count()}}</p>
                    <form>
                        <input type="text" name="search" class="form-control mb-3 border-1 small"
                               placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    </form>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($replies)
                    @foreach($replies as $reply)
                        <tr>
                            <td class="text-muted">{{$reply->id}}</td>
                            <td><p class="text-avatar">
                                    {{$reply->user->username}}
                                </p><p class="text-small text-muted">

                                    {{$reply->user->first_name}}
                                    {{$reply->user ->last_name}}

                                </p>
                            </td>
                            <td>{{$reply->user->email}}</td>
                            <td>{{$reply->body}}</td>
                            <td><p class="text-small text-muted">{{$reply->created_at}}</p></td>
                            <td><p class="text-small text-muted">{{$reply->updated_at}}</p></td>
                            <td>
                                <form class="d-flex" action="{{route('replies.update', $reply->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($reply->is_active == 1)
                                        <input type="hidden" name="is_active" value="{{$reply->is_active}}">
                                        <button href="{{route('replies.update', $reply->id)}}" type="submit" data-toggle="tooltip" data-placement="top" class="btn text-success">
                                            <i class="fa fa-unlock"></i>
                                        </button>
                                    @else
                                        <input type="hidden" name="is_active" value="{{$reply->is_active}}">
                                        <button   type="submit"  class="btn text-danger mr-1">
                                            <i class="fa fa-lock"></i>
                                        </button>
                                    @endif
                                    <a href="{{route('comments.index', $reply->post)}}" class="btn text-info mr-1"><i class="fa fa-eye">back to comments</i></a>
                                    <a href="" class="btn text-success mr-1"><i class="fa fa-eye">Replies</i></a>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>

@endsection
