@if($reply->is_active == 1)

    <li class="single_comment_area py-2">
        <div class="d-md-flex m-2">
            <div class="col-1"></div>
            <!-- Comment Meta -->
            <div class="col-1">
                <img src="{{$reply->user->photo ? asset($reply->user->photo->file) : 'http://via.placeholder.com/70x70' }}" alt="{{$reply->user->first_name}}">

            </div>
            <!-- Comment Content -->
            <div class="comment-content col-4">
                <p class=" fs-5">{{$reply->user->first_name}}  {{$reply->user->last_name}}</p>
                <span class="fs-6 text-muted "><i>{{$reply->created_at->diffForHumans()}}</i></span>
                <p>{{$reply->body}} </p>
                @auth
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-dark br-none mt-2" data-bs-toggle="collapse" href="#collapse{{$reply->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$comment->id}}">
                            Reply <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="collapse" id="collapse{{$reply->id}}">
                        <div class="card card-body">
                            <form action="{{route('comments.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{$reply->id}}">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    <textarea class="form-control shadow-none" name="body" id="body" cols="30" rows="10" placeholder="Leave reply here" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-dark br-none mt-2">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </li>
@endif
@if($reply->comments)
        @if(count($reply->comments))
            @foreach($reply->comments as $childcomments)
<div class="ms-5">
                @include('includes.replies',['reply'=>$childcomments])
</div>
            @endforeach
        @endif
@endif
