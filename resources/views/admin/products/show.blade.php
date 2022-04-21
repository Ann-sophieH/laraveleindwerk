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
