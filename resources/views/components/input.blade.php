<div class="form-group">
    <label class="control-label col-md-3" for="{{ $field }}">{{ $label }}</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        @if ($type == 'select')
            <select name="{{ $field }}" class="form-control col-md-7 col-xs-12" id="{{ $field }}" {{$attr??""}}>
                <option></option>
                @isset($dataSelect)
                    @foreach (json_decode($dataSelect) as $dataSelect)
                        <option value="{{ $dataSelect->value }}">{{ $dataSelect->view }}</option>
                    @endforeach
                @endisset
            </select>
        @else
            <input 
                type="{{ $type }}" 
                class="form-control col-md-7 col-xs-12" 
                id="{{ $field }}" 
                name="{{ $field }}"
                placeholder="{{ $placeholder ?? '' }}" 
                @isset($value)  
                    value="{{ old($field) ?? $value }}" 
                @else
                    value="{{ old($field) }}" 
                @endisset 
                {{$attr??""}}/>
    @endif
</div>

@error($field)
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
