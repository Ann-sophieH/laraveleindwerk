@foreach($product->specifications()->whereNotNull('parent_id')->get() as $active_spec)
    @if($active_spec->name == $sub_specs->name )
<li class="list-group-item  border-0 font-weight-normal  @if($active_spec->name =! $sub_specs->name ) collapse @endif p-3 mb-2 text-sm"  id="specs-collapse{{$spec->id}}">
    <span class="badge opacity-5 ms-3   bg-info "> {{$sub_specs->name}}</span>

</li>

@endif
@endforeach
@if($sub_specs->specs)
    <ul>
        @if(count($sub_specs->specs) > 0)
            @foreach($sub_specs->specs as $childspecs)
                @include('includes.sub_specs',['sub_specs'=>$childspecs])
            @endforeach
        @endif
    </ul>
@endif
