
@extends('layouts.admin')
@section('content')
    <div class="col-11 mx-auto">
        @include('includes.form_error')
        @if(session('photo_message'))
            <div class="alert alert-success opacity-7 alert-dismissible text-white" role="alert">
                <i class="material-icons ps-3">
                    notifications_active
                </i>
                <span class="text-sm ps-4">{{session('photo_message')}} </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close" control-id="ControlID-6">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        @endif
    </div>
    <div class="row p-0 m-0">
        <div class="col-12 mt-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Photos table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Photo</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete ( final !! )</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($photos as $photo)

                                <tr>
                                    <td>

                                        <div class="d-flex px-2 py-1">
                                            <div> {{$photo->id}}</div>
                                            <div>
                                                <img style="height: 62px; width:62px; " class="img-thumbnail img-fluid rounded-circle ms-2 me-2" src="{{$photo->file ? asset($photo->file) : 'http://via.placeholder.com/62x62'}}" alt="{{$photo->name}}">

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-xs text-secondary mb-0">{{$photo->file}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$photo->created_at->diffForHumans()}}</span></td>
                                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$photo->updated_at->diffForHumans()}}</span></td>

                                    <td class="align-middle">
{{--                                        we always need the first 8 photos for navigation so cannot be deleted --}}
                                        @if($photo->id >= 9 )
                                            <div class="d-flex">
                                                <form method="post" action="{{route('photos.destroy', $photo)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn  text-danger" type="submit"><i
                                                            class="fa fa-close "></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <p class="text-muted" style="font-size: 0.7rem"><i>essential for navigation</i></p>
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

@endsection

