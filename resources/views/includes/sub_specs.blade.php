
<li class="list-group-item bg-gray-100 border-0 font-weight-normal  p-3 mb-2 text-sm">
    <span class="badge bg-info opacity-5 ms-3"> {{$sub_specs->name}}</span>


</li>
@if($sub_specs->specs)
    <ul>
        @if(count($sub_specs->specs) > 0)
            @foreach($sub_specs->specs as $childspecs)
                @include('includes.sub_specs',['sub_specs'=>$childspecs])
            @endforeach
        @endif
    </ul>
@endif
