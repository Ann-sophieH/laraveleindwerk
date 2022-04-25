@extends('layouts/index')
@section('content')



    <article>
    <div class="container">
        <div class="row justify-content-center gutter-1">

            <!-- post -->
            <div class="col-lg-8">
                <div class="card card-post card-post-lg">
                    <img class="card-image" src="assets/images/demo/image-1.jpg" alt="Image">
                    <div class="card-body p-4">
                        <ul class="list list--horizontal list--separated text-uppercase fs-14">
                            <li><a href="" class="underline">News</a></li>
                            <li><time datetime="2019-08-24 20:00" class="text-muted">24th Aug, 2019</time></li>
                        </ul>
                        <h2 class="card-title"><a href="">The Story Behind Shopy</a></h2>
                        <p class="card-text">Leo and Violet is us, Leo Dominguez and Violette Polchi, two young Parisian lovers who have shared our lives for almost 10 years. We created this brand together in 2013, strong of the success encountered when launching our first project on Kickstarter. Our will has always been the same: to offer elegant, timeless and functional products. In deciding to cut the intermediaries, we wanted to create a brand of the 21st century: 100% transparent and in direct relationship with you, our customers.</p>
                        <p class="card-text">Mrs. Darling first heard of Peter when she was tidying up her children’s minds. It is the nightly custom of every good mother after her children are asleep to rummage in their minds and put things straight for next morning, repacking into their proper places the many articles that have wandered during the day.</p>
                        <blockquote class="blockquote">
                            <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- share post -->
            <div class="col-lg-8">
                <div class="bg-white p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="eyebrow text-muted">Share this article</span>
                        </div>
                        <div class="col text-right">
                            <ul class="list list--horizontal">
                                <li><a href="#!" class="text-muted d-block text-hover-facebook"><i class="fs-28 icon-facebook-square-brands"></i></a></li>
                                <li><a href="#!" class="text-muted d-block text-hover-instagram"><i class="fs-28 icon-instagram-square-brands"></i></a></li>
                                <li><a href="#!" class="text-muted d-block text-hover-twitter"><i class="fs-28 icon-twitter-square-brands"></i></a></li>
                                <li><a href="#!" class="text-muted d-block text-hover-pinterest"><i class="fs-28 icon-pinterest-square-brands"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- post nav -->
            <div class="col-lg-8">
                <div class="bg-white">
                    <div class="row gutter-0">
                        <div class="col-md-6">
                            <h4 class="interpost interpost-prev">
                                <a href="#!">
                                    Previous article
                                </a>
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="interpost interpost-next">
                                <a href="#!">
                                    Next article
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <!-- comments -->
            <div class="col-lg-8">
                <div class="bg-white p-4">
                    <h3 class="mb-3 text-uppercase fs-20">2 Comments</h3>
                    <div class="bubble">
                        <a href="" class="bubble_avatar"><img class="avatar" src="assets/images/demo/user-1.jpg" alt="Avatar"></a>
                        <div class="bubble_body">
                            <ul class="list list--horizontal">
                                <li><span class="text-uppercase font-weight-bold fs-14">Nicole Campbell</span></li>
                                <li><time datetime="2019-08-24 11:00" class="text-uppercase fs-14">On AUG 24, 11:00AM</time></li>
                            </ul>
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </blockquote>
                            <div>
                                <a href="" class="underlined">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- compose -->
            <div class="col-lg-8">
                <div class="bg-white p-4">
                    <h3 class="mb-3 text-uppercase fs-20">Add Comment</h3>
                    <fieldset class="mb-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="text" id="inputName2" class="form-control form-control-lg" placeholder="Name" required="" control-id="ControlID-5">
                                    <label for="inputName2">Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email" required="" control-id="ControlID-6">
                                    <label for="inputEmail">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-label-group">
                                    <textarea class="form-control form-control-lg" id="inputComment" rows="3" placeholder="Comment" control-id="ControlID-7"></textarea>
                                    <label for="inputComment">Comment</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <a href="" class="btn btn-block btn-primary">Leave a comment</a>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
