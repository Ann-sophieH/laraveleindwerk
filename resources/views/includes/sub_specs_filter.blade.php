


<div class="form-check checkshop">
    <input class="form-check-input shadow-none " name="{{$sub_specs_filter->name}}"  id="{{$sub_specs_filter->name}}" type="checkbox"
           >
    <label class="form-check-label " for="{{$sub_specs_filter->name}}">
        {{$sub_specs_filter->name}}
    </label>
</div>


@if($sub_specs_filter->specs)
    <div class="btn-toggle-nav list-unstyled fw-normal ps-4 small">
        @if(count($sub_specs_filter->specs) > 0)
            @foreach($sub_specs_filter->specs as $childspecs)
                @include('includes.sub_specs_filter',['sub_specs_filter'=>$childspecs])
            @endforeach
        @endif
    </div>
@endif
