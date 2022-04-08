@extends('layouts.admin')
@section('content')
    <div class="row">

        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between ">
                    <div
                        class="bg-gradient-primary opacity-8 shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Specifications table : <span class="ms-5 text-sm "> {{$specs->count()}} main specifications of :   {{\App\Models\Specification::all()->count()}} total </span>
                        </h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4">
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{url('admin/users/create')}}"
                                                                                class="text-white text-center ps-2"> Add
                                    specification</a>

                            </div>
                        </button>

                    </div>
                </div>
                <form class="ms-5 mt-5">
                    @csrf
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>


                <div class="card-body p-3 pb-2">
                    <ul class="list-group">
                        @foreach($specs as $spec)
                        <li class="list-group-item border-0 d-flex justify-content-between p-3 mb-2 border-radius-lg bg-gray-100">

                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark  font-weight-bold text-sm"><span class="opacity-8 badge bg-success">{{$spec->name}}</span></h6>
                                <span class="text-xs">amount of products with this specification : #{{$spec->products()->count()}}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <a  data-bs-toggle="collapse" href="#collapse-{{$spec->id}}" aria-expanded="false" aria-controls="collapse-{{$spec->id}}">
                                See related specifications
                                <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" control-id="ControlID-3">
                                    <i class="fa fa-arrow-down text-lg position-relative me-1"></i>
                                </button>
                                </a>
                            </div>

                        </li>

                            <div class="collapse" id="collapse-{{$spec->id}}">
                                <ul class="list-group flex-column sub-menu m-1">
                                @if(count($spec->childspecs))
                                    @foreach($spec->childspecs as $childspecs)
                                        @include('includes.sub_specs',['sub_specs'=>$childspecs])
                                    @endforeach
                                @endif

                                </ul>
                            </div>
                        @endforeach





                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="row col-3 mx-auto mt-5">
        {{--    {{$specs->render()}}--}}
    </div>
@endsection
