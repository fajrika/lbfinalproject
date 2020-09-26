<div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align" for="{{ $field }}">{{ $label }}</label>
    <div class="{{isset($class)?$class:'col-md-6 col-sm-6 col-xs-12'}}">
        @if ($type == 'select')
            <select name="{{ $field }}" class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" {{$attr??""}}>
                <option value="" disabled selected>{{$placeholder ?? ''}}</option>
                @isset($dataSelect)
                    @foreach (json_decode($dataSelect) as $dataSelect)
                        <option value="{{ $dataSelect->value }}" {{$dataSelect->value == (isset($value)?$value:'') ? 'selected' : ''}}>
                            {{ $dataSelect->view }}
                        </option>
                    @endforeach
                @endisset
            </select>
            @error($field)<div class="invalid-feedback">{{$message}}</div>@enderror
        @elseif ($type == 'textarea')
            <textarea 
                rows="{{isset($rows)?$rows:0}}"
                type="{{ $type }}" 
                class="form-control @error($field) is-invalid @enderror" 
                id="{{ $field }}" 
                name="{{ $field }}"
                placeholder="{{ $placeholder ?? '' }}"  
                {{$attr??""}}>@isset($value){{ old($field) ?? $value }}@else{{ old($field) }}@endisset</textarea>
            @error($field)<div class="invalid-feedback">{{$message}}</div>@enderror
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
