@extends('layouts/index')
@section('content')




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
        <section class="gazette-post-discussion-area section_padding_100 bg-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <!-- Comment Area Start -->
                        <div class="comment_area section_padding_50 clearfix">
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
                                <h4 class="font-bold">Discussion</h4>
                            </div>

                            <ol>
                                <!-- Single Comment Area -->

                                @foreach($post->postcomments as $postcomm)
                                    @if($postcomm->is_active == 1)
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-md-flex align-items-start">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="{{$postcomm->user->photo ? asset($postcomm->user->photo->file) : 'http://via.placeholder.com/70x70' }}" alt="{{$postcomm->user->first_name}}">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <h5>{{$postcomm->user->first_name}}  {{$postcomm->user->last_name}}</h5>

                                                    <span class="comment-date font-pt text-muted">{{$postcomm->created_at->diffForHumans()}}</span>
                                                    <p>{{$postcomm->body}}</p>

                                                    <div class="accordion">
                                                        <a class="btn reply-btn" data-toggle="collapse" href="#collapse{{$postcomm->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$postcomm->id}}">
                                                            Reply <i class="fa fa-reply" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="collapse" id="collapse{{$postcomm->id}}">
                                                            <div class="card card-body">
                                                                <form action="{{route('replies.store')}}" method="post">
                                                                    @csrf

                                                                    <input type="hidden" name="comment_id" value="{{$postcomm->id}}">

                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Leave reply here" required></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn reply-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div> @can('update', $postcomm)
                                                <ol class="children">
                                                    @foreach($postcomm->replies as $reply)

                                                        <li class="single_comment_area">
                                                            <div class="comment-wrapper d-md-flex align-items-start">

                                                                <!-- Comment Meta -->
                                                                <div class="comment-author">
                                                                    <img src="{{$reply->user->photo ? asset($reply->user->photo->file) : 'http://via.placeholder.com/70x70' }}" alt="{{$reply->user->first_name}}">

                                                                </div>
                                                                <!-- Comment Content -->
                                                                <div class="comment-content">
                                                                    <h5>{{$reply->user->first_name}}  {{$reply->user->last_name}}</h5>
                                                                    <span class="comment-date text-muted">{{$reply->created_at->diffForHumans()}}</span>
                                                                    @if($reply->id == $reply->comment->best_reply_id) <p class="badge badge-pill badge-success">Best reply</p>   @endif
                                                                    <p>{{$reply->body}} </p>
                                                                    @auth
                                                                        <div class="d-flex justify-content-between">
                                                                            <a class="btn reply-btn" data-toggle="collapse" href="#collapse{{$reply->id}}" role="button" aria-expanded="false" aria-controls="collapse{{$reply->id}}">
                                                                                Reply <i class="fa fa-reply" aria-hidden="true"></i>
                                                                            </a>
                                                                            <form method="post" action="{{route('bestreply', $reply)}}">
                                                                                @csrf
                                                                                <button type="submit" class="btn text-muted p-0">Best reply</button>
                                                                            </form></div>
                                                                        <div class="collapse" id="collapse{{$reply->id}}">
                                                                            <div class="card card-body">
                                                                                <form action="" method="post">
                                                                                    @csrf

                                                                                    <input type="hidden" name="comment_id" value="{{$reply->id}}">

                                                                                    <div class="form-group">
                                                                                        <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Leave reply here" required></textarea>
                                                                                    </div>
                                                                                    <button type="submit" class="btn reply-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    @endauth
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>  @endcan

                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    @auth
                        <!-- Leave A Comment -->
                            <div class="leave-comment-area clearfix">
                                <div class="comment-form">
                                    <div class="gazette-heading">
                                        <h4 class="font-bold">leave a comment</h4>
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
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </section>



    </section>
@endsection
