
@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('product_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('product_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>
    <div class="row py-4  p-0 m-0">
        <div class="col-10 mx-auto d-flex justify-content-around">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon icon-md icon-shape  bg-gradient-primary shadow text-center border-radius-md">
                                <i class="material-icons text-lowercase opacity-10 ">apps</i>
                            </div>
                        </div>
                        <div class="col-8 my-auto text-end ">
                            <a href="{{route('products.index')}}">
                                <p class="text-sm font-weight-bolder text-uppercase  d-inline  mb-0 opacity-7">all products</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @foreach($categories as $cat)

                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon icon-md icon-shape  bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="material-icons text-lowercase opacity-10 @if ($loop->last) ps-3 @endif">{{$cat->name}}</i>
                                </div>
                            </div>
                            <div class="col-8 my-auto text-end ">
                                <a href="{{route('admin.productsPerCat', $cat->id)}}">
                                    <p class="text-sm font-weight-bolder text-uppercase  d-inline  mb-0 opacity-7"> {{$cat->name}}</p>
                                    <a class="text-xxs" data-bs-toggle="collapse"
                                       href="#collapse-{{$cat->id}}" aria-expanded="false"
                                       aria-controls="collapse-{{$cat->id}}">
<!--                                    <button
                                        class="btn btn-link text-dark d-inline text-sm mb-0 px-0 ms-2"
                                        >
                                        <i class="fa fa-arrow-down text-lg position-relative me-1"></i>
                                    </button>--> </a>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                        <h6 class="text-white text-capitalize ps-3">Products table :  <span class="ms-5 text-sm "> {{$products->count()}}  /  {{\App\Models\Product::all()->count()}}  </span></h6>
                        <button class="btn bg-gradient-warning  mb-0  me-4" >
                            <div class=" me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">add</i> <a href="{{route('products.create')}}" class="text-white text-center ps-2"> Add product</a>

                            </div>
                        </button>
                    </div>
                </div>
                <form class="ms-5 mt-5">
                    @csrf
                    <input type="text" name="search" class="form-control mb-3 border-1 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product specifications</th>


                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deleted</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

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
                                                    @if($loop->first)
                                                    <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="{{ empty($photo) ? 'http://via.placeholder.com/62x62' : asset($photo->file) }}" alt="{{$product->name}}">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img style="height: 62px" class=" img-fluid rounded-circle ms-2 me-2" src="http://via.placeholder.com/62x62" alt="{{$product->name}}">

                                                @endif
                                            </div>

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-xs text-secondary mb-0">{{$product->name}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center">

                                        @foreach($product->specifications->whereNotNull('parent_id') as $spec)
                                            <span class="badge badge-sm bg-gradient-faded-success text-secondary text-xxs font-weight-bold">{{$spec->name}}</span>
                                        @endforeach
                                    </td>

                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$product->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$product->updated_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        @if($product->deleted_at != null)
                                            <a class="btn btn-warning" href="{{route('products.restore',$product->id)}}">Restore</a>
                                        @else
                                            <form method="POST"
                                                  action="{{action("App\Http\Controllers\AdminProductsController@destroy", $product->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn text-warning" type='submit'
                                                   href="{{route('details', $product)}} "><i
                                                        class="fa fa-eye mt-3"></i></a>
                                                <a class="btn text-info" type='submit'
                                                   href="{{route('products.edit', $product->id)}} "><i
                                                        class="fa fa-edit mt-3"></i></a>
                                                <button class="btn  mt-2 ps-5 text-danger" type="submit"><i
                                                        class="fa fa-close "></i></button>

                                            </form>


                                        @endif
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

