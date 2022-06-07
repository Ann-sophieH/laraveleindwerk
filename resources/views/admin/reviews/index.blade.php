@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(Session::has('productreview_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('productreview_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>

    <div class=" stretch-card mb-5 m-2 mt-5">
        <div class="card">
                <div class="d-flex justify-content-between p-3 mt-4">
                    <div>
                        <h4 class="card-title">Product reviews</h4>
                        <p class="card-description m-4"> Click the eye to see all product info for which the review was left
                        </p>
                        <p class="card-description m-4">Display : {{$reviews->count()}} of {{$reviews->total()}}</p>
                        <form>
                            <input type="text" name="search" class="form-control mb-3 border-1 small"
                                   placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        </form>
                    </div>
                </div>

        <table class="table table-hover m-2">
            <thead>
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Product</th>
                <th class="text-center">Stars</th>
                <th>Review</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @if($reviews)
                    @foreach($reviews as $review)
                        <tr>
                            <td class="text-muted">{{$review->id}}</td>
                            <td><p class="text-avatar">
                                    {{$review->user->username}}
                                </p><p class="text-small text-muted">

                                    {{$review->user->first_name}}
                                    {{$review->user ->last_name}}

                                </p>
                            </td>
                            <td>{{$review->product->name}}</td>
                            <td class=" text-center "><span class="badge badge-circle @if($review->stars >= 3 ) bg-success @elseif($review->stars == 2) bg-warning @else bg-danger @endif">{{$review->stars}}</span></td>
                            <td>{{Str::limit($review->body, 35)}}</td>
                            <td><p class="text-small text-muted">{{$review->created_at}}</p></td>
                            <td><p class="text-small text-muted">{{$review->updated_at}}</p></td>
                            <td>
                                <form class="d-flex" action="{{route('reviews.update', $review->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if($review->is_active == 1)
                                        <input type="hidden" name="is_active" value="{{$review->is_active}}">
                                        <button href="{{route('reviews.update', $review->id)}}" type="submit" data-toggle="tooltip" data-placement="top" class="btn text-success">
                                            <i class="fa fa-unlock"></i>
                                        </button>
                                    @else
                                        <input type="hidden" name="is_active" value="{{$review->is_active}}">
                                        <button   type="submit"  class="btn text-danger mr-1">
                                            <i class="fa fa-lock"></i>
                                        </button>
                                    @endif
                                       {{-- <a href="{{route('show.product', $review->product)}}" class="btn text-info mr-1"><i class="fa fa-eye">Post</i></a>
                                        <a href="{{route('reviews.show', $review->id)}}" class="btn text-success mr-1"><i class="fa fa-eye">Replies</i></a>
                              --}}  </form>

                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
        </div>
    </div>
    </div>

@endsection
