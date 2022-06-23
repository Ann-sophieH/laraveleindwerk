@extends('layouts/index')
@section('content')
{{--    optional blog here  https://themes.getbootstrap.com/preview/?theme_id=59250--}}
{{--    https://themes.getbootstrap.com/preview/?theme_id=59250 1 post--}}
<!--
https://preview.colorlib.com/#magdesign
-->
<div class="container-fluid col-lg-10 offset-lg-1 mt-4 ">
    <aside aria-label="breadcrumb">
        <ol class="breadcrumb fs-li">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">Blog</li>
        </ol>
    </aside>
</div>

    <section class="container-fluid col-10 mx-auto fs-reg">
            <div class="row mt-5 mb-5">
                    <h1 class="fs-1 fs-reg text-uppercase text-center">Blog</h1>
            </div>

        <div class="row p-4 p-md-5 mb-4 text-white rounded bg-gray-600">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic fs-bo">{{Str::limit($sticky_post->title, 20, '...')}}</h1>
                <p class="gazette-post-date fs-li"><i>{{$sticky_post->created_at->diffForHumans()}}</i> by {{$sticky_post->user->first_name}}  {{$sticky_post->user->last_name}}</p>
                <div class="gazette-post-tag">
                    <span class="badge @if($sticky_post->category->id === 1) bg-success @else bg-primary @endif text-white text-xxs font-weight-bold">{{$sticky_post->category->name}}</span>

                </div>
                <p class="lead my-3">{{Str::limit($sticky_post->body, 260, '...')}}</p>
                <button class="btn btn-outline-light br-none my-4" type="submit">
                    <a href="{{route('blogpost', $sticky_post)}}" class="font-pt text-white">Continue Reading </a>
                    <i class="bi bi-arrow-right"></i>
                </button>            </div>
        </div>

        <section class="row catagory-welcome-post-area section_padding_100">

                    @foreach($posts as $post )
                        <div class="col-12 col-md-6 mt-auto">
                            <!-- Gazette Welcome Post -->
                            <div class="gazette-welcome-post my-5 pb-2 p-2">
                                <!-- Post Tag -->

                                <h2 class="font-pt fs-bo">{{Str::limit($post->title, 20, '...')}}</h2>
                                <p class="gazette-post-date fs-li"><i>{{$post->created_at->diffForHumans()}}</i> by {{$post->user->first_name}}  {{$post->user->last_name}}</p>
                                <div class="gazette-post-tag">
                                    <span class="badge @if($post->category->id === 1) bg-success @else bg-primary @endif text-white text-xxs font-weight-bold">{{$post->category->name}}</span>

                                </div>
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail my-3">
                                    @if(($post->photos)->isNotEmpty())
                                        @foreach($post->photos as $photo)
                                            @if($loop->first)
                                                <img  class=" img-fluid  " src="{{ empty($photo) ? 'http://via.placeholder.com/1000x600' : asset($photo->file) }}" alt="{{$post->title}}">
                                            @endif
                                        @endforeach
                                    @else
                                        <img  class=" img-fluid  " src="http://via.placeholder.com/1000x600" alt="{{$post->title}}">

                                    @endif
                                </div>
                                <!-- Post Excerpt -->
                                <p>{{Str::limit($post->body_short, 150, '...')}}</p>
                                <!-- Reading More -->
                                <div class="post-continue-reading-share mt-30">
                                    <div class="post-continue-btn">
                                        <button class="btn btn-outline-dark br-none mt-2 " type="submit">
                                            <a href="{{route('blogpost', $post)}}" class="font-pt">Continue Reading </a>
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                <div class=" col-3  mx-auto my-5">
                    {{$posts->render()}}
                </div>


        </section>

    </section>

@endsection
