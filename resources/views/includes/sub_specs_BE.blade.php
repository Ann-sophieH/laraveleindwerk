
<li class="list-group-item bg-gray-100 border-0 font-weight-normal d-flex justify-content-between p-3 mb-2 text-sm">
    <span class="badge bg-info opacity-5   ms-3"> {{$sub_specs->name}}</span>
    <span class="text-xs">amount of products with this specification : #{{$sub_specs->products()->count()}}</span>
    <div class="col-2">
        @if($sub_specs->deleted_at != null)
            <a class="btn btn-link text-dark  mb-0" href="{{route('specifications.restore',$sub_specs->id)}}"><i class="material-icons text-sm me-2">restore</i>Restore</a>
        @else
            <form method="POST"
                  action="{{action("App\Http\Controllers\AdminSpecificationsController@destroy", $sub_specs->id)}}">
                @csrf
                @method('DELETE')
                <a href="{{route('specifications.edit', $sub_specs->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit color">
                    <i class="material-icons text-sm me-2">edit</i>
                </a>
                <button class="btn btn-link text-danger text-gradient px-3 mb-0 ps-5" type="submit"><i class="material-icons text-sm me-2">delete</i></button>
            </form>
        @endif
    </div>

</li>
@if($sub_specs->specs)
    <ul>
        @if(count($sub_specs->specs) > 0)
            @foreach($sub_specs->specs as $childspecs)
                @include('includes.sub_specs_BE',['sub_specs'=>$childspecs])
            @endforeach
        @endif
    </ul>
@endif
