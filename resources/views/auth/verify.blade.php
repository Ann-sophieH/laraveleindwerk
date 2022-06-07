@extends('layouts.index')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center py-5 my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-bo bg-success bg-opacity-50">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body my-3 fs-li">
                    @if (session('resent'))
                        <div class="alert alert-success opacity-5 alert-dismissible text-white" role="alert">
                            <i class="bi bi-cart-check ps-3">

                            </i>
                            <span class="text-sm ps-4">{{ __('A fresh verification link has been sent to your email address.') }}</span>
                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                                <span aria-hidden="true">×</span>
                            </button>

                        </div>
                    @endif

                    {{ __('Before proceeding to your account, please check your email for a verification link.') }} <br><br>
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link  p-0 m-0 align-baseline"><b>{{ __('click here to request another') }}</b></button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
