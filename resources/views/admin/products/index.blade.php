
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Products table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product specifications</th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deleted</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td>

                                        <div class="d-flex px-2 py-1">
                                            <div> {{$product->id}}</div>
                                            <div>
                                                <img style="height: 62px" class="img-thumbnail img-fluid rounded-circle ms-2 me-2" src="{{$product->file ? asset($product->file) : 'http://via.placeholder.com/62x62'}}" alt="{{$product->name}}">

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-xs text-secondary mb-0">{{$product->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold  {{$product->color}}">{{$product->color}}</span></td>
                                    <td class="align-middle text-center">
                                        @foreach($product->specifications as $spec)
                                            <span class="badge badge-sm bg-gradient-faded-success text-secondary text-xxs font-weight-bold">{{$spec->name}}</span>
                                        @endforeach
                                    </td>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">amount left</th>

                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$product->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$product->updated_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit product">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

