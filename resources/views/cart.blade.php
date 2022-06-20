@extends('layouts/index')
@section('content')
    @include('includes.breadcrum_top')
    @include('includes.form_error')

    <div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
    @if(session('payment_message'))
        <div class="alert alert-success opacity-5 alert-dismissible text-muted" role="alert">
            <i class="bi bi-cart-check ps-3">

            </i>
            <span class="text-sm ps-4">{{session('payment_message')}} </span>
            <button type="button" class="btn-close text-lg py-3 opacity-8" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                <span aria-hidden="true"></span>
            </button>
        </div>

    @endif
    <h1 class=" m-2 mt-4">Shopping Cart</h1>



    <div>

        <livewire:cart-list>

        </livewire:cart-list>

    </div>

</div>



@endsection
