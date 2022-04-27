<div>
    <section class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
            <div class="card mb-4 br-none ">
                <div class="card-body ">
                    <!--  item -->
                    <div  >
                        <article class="row" >
                            <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                                <img src="" alt="">
                            </div>
                            <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                                <p></p>
                                <p class="fs-reg"></p>
                                <p></p>
                            </div>
                            <div class="col-1 order-1 order-lg-2">
                                <button class="btn" type="button"><i class="bi bi-x-circle" wire:click="removeItem('{{$product->id}}')" ></i></button>
                            </div>
                            <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                                <button class="btn  shadow-none" type="button"   wire:click="QuantityDown('{{$product->id}}')" ><i class="bi bi-arrow-down"></i></button>
                                <input readonly class="text-center mb-4 border pt-1"  style="max-width: 60px"  :value>
                                <button class="btn  shadow-none" type="button" wire:click="QuantityUp('{{$product->id}}')"><i class="bi bi-arrow-up  "></i></button>
                                <p class="text-start text-md-center fs-bo"> €</p>
                                <p class="text-start text-md-center fs-bo">totaal: € </p>

                            </div>

                        </article>
                        <hr class="my-4"/>
                    </div>
                    <!--<article class="row">
                        <div class=" col-4 col-lg-3 mb-4 mb-lg-0">
                            <img alt="cart product" src="../assets/images/products/bo_speakers_shape.png"/>
                        </div>
                        <div class="col-6 col-lg-5 mb-4 mb-lg-0 fs-li">
                            <p class="fs-reg">Beosound Shape</p>
                            <p>Color: Purple heart</p>
                        </div>
                        <div class="col-1 order-1 order-lg-2">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <div class="col-md-5 col-lg-3 mb-4 mb-lg-0 order-2 order-lg-1 ">
                        <button class="btn  shadow-none"><i class="bi bi-arrow-down"></i></button>
                            <input class="text-center mb-4 border pt-1" min="1" style="max-width: 100px" type="number" value="1">
                            <button class="btn shadow-none"><i class="bi bi-arrow-up"></i></button>
                            <p class="text-start text-md-center fs-bo">€ 1,899</p>
                        </div>
                    </article>-->


                    <!--  item -->
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Expected shipping delivery</strong></p>
                    <p class="mb-0">12.12.2021 - 14.10.2022</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="text-uppercase fs-bo fsize-2 mb-3">Order Total</h2>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                            Products
                            <p>&#8364;</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center  px-0">
                            Shipping
                            <p>Free</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 mt-3">
                            <div>
                                Total amount
                                <p class="mb-0">(including VAT)</p>
                            </div>
                            <p>&#8364; </p>
                        </li>
                    </ul>
                    <a href="{{route('checkout')}}"><button class="btn btn-outline-dark br-none  " type="button">
                            Go to checkout
                        </button>                    </a>

                </div>
            </div>
        </div>

    </section>
</div>
