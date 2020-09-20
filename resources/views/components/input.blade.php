<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="{{ $field }}">{{ $label }}</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @if ($type == 'select')
            <select name="{{ $field }}" class="form-control" id="{{ $field }}" {{$attr??""}}>
                <option></option>
                @isset($dataSelect)
                    @foreach (json_decode($dataSelect) as $dataSelect)
                        <option value="{{ $dataSelect->value }}">
                            {{ $dataSelect->view }}
                        </option>
                    @endforeach
                @endisset
            </select>
        @else
            <input 
                type="{{ $type }}" 
                class="form-control @error($field) is-invalid @enderror" 
                id="{{ $field }}" 
                name="{{ $field }}"
                placeholder="{{ $placeholder ?? '' }}" 
                @isset($value)  
                    value="{{ old($field) ?? $value }}" 
                @else
                    value="{{ old($field) }}" 
                @endisset 
                {{$attr??""}}/>
            @error($field)<div class="invalid-feedback">{{$message}}</div>@enderror

        @endif
    </div>
    @error($field)
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
