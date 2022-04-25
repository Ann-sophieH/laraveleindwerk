
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Colors table :  <span class="ms-5 text-sm "> {{$colors->count()}}  /  {{\App\Models\Color::all()->count()}}  </span></h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{route('colors.create')}}" class="text-white text-center ps-2"> Add color</a>

                            </div>
                        </button>
                    </div>
                </div>
                <div class="table">
                </div>
            </div>
        </div>
    </div>
    <div class=" col-3 mx-auto">
        {{$colors->render()}}

    </div>
@endsection

