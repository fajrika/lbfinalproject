
<div class="clearfix"></div>
<form 
    class="form-horizontal form-label-left" 
    action="{{$action}}" 
    method="{{strtolower($method)!='get'?'POST':'GET'}}">
    @csrf
    @method($method)
    <div class="col-md-12" style="min-height: 40px">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="clearfix"></div>

    {{ $slot }}

    <div class="ln_solid"></div>
    <div class="row">
        <div class="col-md-1" style="margin:auto;float:none">
            <button id="send" type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
