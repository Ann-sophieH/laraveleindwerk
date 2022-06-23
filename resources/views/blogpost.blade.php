@extends('layouts/index')
@section('content')
    <div class="container-fluid col-lg-10 offset-lg-1 mt-4 ">
        <aside aria-label="breadcrumb">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">{{$post->title}}</li>
            </ol>
        </aside>
    </div>




    <section class="container-fluid  post-area fs-reg ">
        <!-- Single Post Title -->
        <article class="row  my-5">
            <div class="col-10 mx-auto text-center">
                <div class="row single-post-title bg-img background-overlay mt-5" >

                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">

                                <a href="">{{$post->category->name}}</a>

                            </div>
                            <h1 class="py-3">{{$post->title}}</h1>
                            <p><i>{{$post->created_at->diffForHumans()}} </i> by {{$post->user->first_name}}  {{$post->user->last_name}}</p>
                        </div>


                </div>

                <div class="row single-post-contents mb-5">
                            <div class="single-post-text">
                                <p>{{$post->body_short}}</p>
                            </div>
                            <div class="single-post-thumb">
                                @if(($post->photos)->isNotEmpty())
                                    @foreach($post->photos as $photo)
                                        @if($loop->first)
                                            <img style="height: 500px" class=" img-fluid  my-5" src="{{ empty($photo) ? 'http://via.placeholder.com/1000x600' : asset($photo->file) }}" alt="{{$post->title}}">
                                        @endif
                                    @endforeach
                                @else
                                    <img style="height: 500px" class=" img-fluid  my-5" src="http://via.placeholder.com/1000x600" alt="{{$post->title}}">
                                @endif
                            </div>
                    @if(($post->blockquote) != '' OR NULL)
                            <div class="single-post-blockquote">
                                <blockquote class="fs-bo py-3"><i>
                                        &#8220; {{$post->blockquote}}&#8221;
                                    </i>   </blockquote>
                            </div>
                    @endif
                            <div class="single-post-text">
                                <p>{{$post->body_long}}</p>
                            </div>
                    </div>
                </div>


            </article>
        <section class="row mx-auto comments py-5 mt-5  bg-gray-200 fs-reg" id="comments">
                    <div class="col-12 col-md-10 mx-auto">
                        <!-- Comment Area Start -->
                        <div class="comment_area ">
                            @if(Session::has('postcomment_message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-check-circle"></i>Comment submitted!</strong>
                                    Your comment is awaiting moderation
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="gazette-heading">
                                <h2 class="font-bold py-5 fs-2 text-center">Discussion</h2>
                            </div>

                            <ul class="list-unstyled bg-gray-100">
                                <!-- Single Comment Area -->
                                @foreach($comments as $comment)
                                    @if($comment->is_active == 1)
                                        <li class="row single_comment_area ">
                                            <div class=" d-md-flex m-2 pb-2">
                                                <!-- Comment Meta -->
                                                <div class="col-1">
                                                    <img
                                                        src="{{$comment->user->photo ? asset($comment->user->photo->file) : 'http://via.placeholder.com/70x70' }}"
                                                        alt="{{$comment->user->first_name}}">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content col-4">
                                                    <p class="fs-bo fs-5">{{$comment->user->first_name}}  {{$comment->user->last_name}}</p>

                                                    <span class="fs-6 text-muted "><i>{{$comment->created_at->diffForHumans()}}</i></span>
                                                    <p>{{$comment->body}}</p>
                                                    @auth
                                                    <div class="">

                                                        <a class="btn btn-outline-dark br-none mt-2" data-bs-toggle="collapse" href="#collapse{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$comment->id}}">
                                                            Reply <i class="bi bi-arrow-right"></i>
                                                        </a>
                                                        <div class="collapse" id="collapse{{$comment->id}}">
                                                            <div class="card card-body">
                                                                <form action="{{route('comments.store')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="post_id" value="{{$post->id}}">

                                                                    <input type="hidden" name="parent_id" value="{{$comment->id}}">

                                                                    <div class="form-group">
                                                                        <textarea class="form-control shadow-none" name="body" id="body" cols="30" rows="10" placeholder="Leave reply here" required></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-outline-dark br-none mt-2">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endauth

                                                </div>
                                            </div>

                                                <ul class="children list-unstyled">
                                                    @if(count($comment->childcomments))
                                                         @foreach($comment->childcomments as $childcomments)
                                                            @include('includes.replies',['reply'=>$childcomments])
                                                         @endforeach
                                                    @endif
                                                </ul>


                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @auth
                        <!-- Leave A Comment -->
                            <div class="leave-comment-area clearfix py-3 my-5">
                                    <div class="gazette-heading">
                                        <h2 class="font-bold fs-4">leave a comment</h2>
                                    </div>
                                    <!-- Comment Form -->
                                    <form action="{{route('comments.store')}}" method="post">
                                        @csrf

                                        <input type="hidden" name="post_id" value="{{$post->id}}">

                                        <div class="form-group">
                                            <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Leave comment here" required></textarea>
                                        </div>
                                        <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                    </form>
                            </div>
                        @endauth
                    </div>
        </section>



    </section>
@endsection
