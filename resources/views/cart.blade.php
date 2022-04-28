@extends('layouts/index')
@section('content')
    @include('includes.breadcrum_top')
<div class="container-fluid col-lg-10 offset-lg-1 mt-5 fs-reg">
    <h1 class=" m-2 mt-4">Shopping Cart</h1>



    <div>

        <livewire:cart>

        </livewire:cart>

    </div>

</div>



@endsection
