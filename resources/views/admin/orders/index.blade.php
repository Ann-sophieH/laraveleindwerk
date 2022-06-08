
@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('order_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('order_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>
    <div class="row m-0 p-0">
        <livewire:orders>

        </livewire:orders>
    </div>

@endsection

