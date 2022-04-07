
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Products table</h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{route('products.create')}}" class="text-white text-center ps-2"> Add product</a>

                            </div>
                        </button>
                    </div>
                </div>
                <form class="ms-5 mt-5">
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
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
                                                @if(($product->photos)->isNotEmpty())
                                                @foreach($product->photos as $photo)

                                                    <img style="height: 62px" class="img-thumbnail img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$product->name}}">
                                                @endforeach
                                                @else
                                                    <img style="height: 62px" class="img-thumbnail img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$product->name}}">

                                                @endif
                                            </div>

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-xs text-secondary mb-0">{{$product->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center d-flex ">
                                        @foreach($product->colors as $color)
                                            <div class="p-2">
                                                 <span class="text-secondary text-xs font-weight-bold  {{$color->name}}">
                                            {{$color->name}}
                                        </span>
                                                <div class="">
                                                    <label class="btn-colour form-label " for="{{$color->name}}" style="background-color: {{$color->hex_value}}; width: 2rem; height: 2rem;border-radius: 50%"></label>
                                                    <input name="colour " type="checkbox" id="{{$color->name}}" class="input-invisible form-control">
                                                </div>
                                            </div>

                                        @endforeach
                                    </td>
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
                                        <a href="{{route('products.edit', $product->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit product">
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
    <div class=" col-3 mx-auto">
        {{$products->render()}}

    </div>
@endsection

