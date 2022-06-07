@extends('layouts.index')
@section('content')
    <div class="container-fluid col-lg-10 offset-lg-1 mt-4 ">
        <aside aria-label="breadcrumb">
            <ol class="breadcrumb fs-li">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li aria-current="page" class="breadcrumb-item active">FAQ</li>
            </ol>
        </aside>
    </div>



    <section id="parallax2">

        <div class="container-fluid row col-lg-10 offset-lg-1 mt-3  ">

            <div class="accordion mt-3 mb-3 fs-reg text-muted br-none" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button aria-controls="collapseTwo" aria-expanded="false" class="accordion-button collapsed"
                                data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                            Shipping & returns
                        </button>
                    </h2>
                    <div aria-labelledby="headingTwo" class="accordion-collapse collapse show shadow-none"
                         data-bs-parent="#accordionExample"
                         id="collapseTwo">
                        <div class="accordion-body">
                            <p> Shipping takes approximately 1 to 5 businessdays. Arrival of your package will be calculated at checkout</p>
                            <p> Returns can be made within 14 days of having the product delivered. If anything is not to your liking you can
                                email us withing 14 days of arrival.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button aria-controls="collapseOne" aria-expanded="false" class="accordion-button"
                                data-bs-target="#collapseOne"
                                data-bs-toggle="collapse" type="button"> How can i make an account?
                        </button>
                    </h2>
                    <div aria-labelledby="headingOne" class="accordion-collapse collapse "
                         data-bs-parent="#accordionExample"
                         id="collapseOne">
                        <div class="accordion-body  p-3">
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                    cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                    obcaecati optio quibusdam quod rerum, similique temporibus.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                    cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                    obcaecati optio quibusdam quod rerum, similique temporibus.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                    cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                    obcaecati optio quibusdam quod rerum, similique temporibus.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button aria-controls="collapseThree" aria-expanded="false" class="accordion-button collapsed"
                                data-bs-target="#collapseThree" data-bs-toggle="collapse" type="button"> How to contact us
                        </button>

                    </h2>
                    <div aria-labelledby="headingThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="collapseThree">
                        <div class="accordion-body">
                           <p class="text-center  fs-5"> <a href="{{route('contact')}}" class=" "> Contact page here</a> <i class="bi bi-arrow-right"></i></p>
                            <p >



                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.
                            </p>

                        </div>
                    </div>

                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button aria-controls="collapseFour" aria-expanded="false" class="accordion-button collapsed"
                                data-bs-target="#collapseFour" data-bs-toggle="collapse" type="button"> Terms of use
                        </button>

                    </h2>
                    <div aria-labelledby="headingFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample" id="collapseFour">
                        <div class="accordion-body">
                            <p >


                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.

                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque consequatur
                                cupiditate eius, est eum excepturi explicabo harum ipsa iusto, maiores modi nam
                                obcaecati optio quibusdam quod rerum, similique temporibus.
                            </p>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>


@endsection
