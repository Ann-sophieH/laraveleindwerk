@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-11 mx-auto">
            @include('includes.form_error')
            @if(session('spec_message'))
                <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                    <i class="material-icons ps-3">
                        notifications_active
                    </i>
                    <span class="text-sm ps-4">{{session('spec_message')}} </span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            @endif</div>
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 justify-content-between ">
                    <div
                        class="bg-gradient-primary opacity-8 shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Specifications table : <span class="ms-5 text-sm "> {{$specs->count()}} main specifications of :   {{\App\Models\Specification::all()->count()}} total </span>
                        </h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" type="button"   data-bs-toggle="modal" data-bs-target="#exampleModal" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i>  Add specification

                            </div>
                        </button>

                    </div>
                </div>
                <form class="ms-5 mt-5 input-group-outline">
                    @csrf
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" onfocus="focused(this)" onfocusout="defocused(this)" control-id="ControlID-1">
                </form>


                <div class="card-body p-3 pb-2">
                    <ul class="list-group">
                        @foreach($specs as $spec)
                        <li class="list-group-item border-0 d-flex justify-content-between p-3 mb-2 border-radius-lg bg-gray-100">

                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark  font-weight-bold text-sm"><span class="opacity-8 badge bg-success">{{$spec->name}}</span></h6>

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
                                @if(count($spec->childspecs) )
                                    @foreach($spec->childspecs as $childspecs)
                                        @include('includes.sub_specs_BE',['sub_specs'=>$childspecs])
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
    <!-- Modal SPEC CREATE -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new specification to database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('specifications.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <select class="form-select form-select-md mb-3 p-2" name="parent_id" aria-label=".form-select-lg example">
                            <option selected disabled> Choose sort of specification </option>
                            <option  value="1"> Wifi type </option>
                            <option value="2"> Bluetooth </option>
                            <option value="3"> Charging </option>
                            <option value="4"> Size </option>
                            <option value="5"> Noise cancelling </option>
                            <option value="6"> Pairing options </option>


                        </select>
                        <div class="input-group input-group-dynamic mt-5">
                            <input class="fs-5 form-control" type="text" onfocus="focused(this)" required
                                   onfocusout="defocused(this)" control-id="ControlID-2" id="name" name="name" placeholder="Specification name...">
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary opacity-8">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
