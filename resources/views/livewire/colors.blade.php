<div>
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

            <form class="ms-5 mt-5 input-group-outline">
                <input wire:model.debounce.200ms="search" type="text" name="searchLivewire" class="form-control  mb-3 border-1 small" onfocus="focused(this)" onfocusout="defocused(this)" control-id="ControlID-1"
                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            </form>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Color</th>


                            <th class=" align-items-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                <i class="fa fa-sort  "></i>
                                <button wire:click="sortBy('name')" class="btn p-0 m-0 shadow-none"><strong>Name</strong></button>
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hex code</th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deleted</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)

                            <tr>
                                <td>
                                        <span class=" text-xs font-weight-bold ps-3">
                                         {{$color->id}}
                                        </span>

                                </td>
                                <td class="align-middle text-center">
                                    <label class="btn-colour form-label " for="{{$color->name}}" style="background-color: {{$color->hex_value}}; width: 2rem; height: 2rem;border-radius: 50%"></label>
                                    <input name="colour " type="checkbox" id="{{$color->name}}" class="input-invisible form-control">
                                </td>

                                <td class="text-center text-uppercase text-xxs font-weight-bolder opacity-9"><span class=" text-xs font-weight-bold">{{$color->name}}</span></td>
                                <td class="text-center text-uppercase  text-xxs font-weight-bolder opacity-9"><span class=" text-xs font-weight-bold">{{$color->hex_value}}</span></td>

                                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$color->created_at}}</span></td>
                                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{$color->updated_at}}</span></td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{$color->deleted_at}}</span>
                                </td>
                                <td class="align-middle ">

                                    @if($color->deleted_at != null)
                                        <a class="btn btn-link text-dark px-3 mb-0" href="{{route('colors.restore',$color->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
                                    @else
                                        <form method="POST"
                                              action="{{action("App\Http\Controllers\AdminColorsController@destroy", $color->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('colors.edit', $color->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit color">
                                                <i class="material-icons text-sm me-2">edit</i>
                                            </a>
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0 ps-5" type="submit"><i class="material-icons text-sm me-2">delete</i></button>

                                    @endif
                                </td>
                                <div class="ms-auto text-end">

                                </div>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-3 mx-auto">
        {{$colors->render()}}

    </div>

</div>
