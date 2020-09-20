@extends('themes.gentelella')

@section('header', 'Item')
@section('title', 'Edit')
@section('subtitle', '')
@section('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endsection
@section('content')
    <a class="btn btn-success" style="float: right" href='{{ route('item.index')}}'>Back</a>
    <x-form action="{{route('item.update',$item->id)}}" method="PUT">
        <x-input field="code" label="Code" type="text" placeholder="{{$item->code}}" value="{{$item->code}}"/>
        <x-input field="name" label="Name" type="text" placeholder="{{$item->name}}" value="{{$item->name}}"/>
        <x-input field="type" label="Type" type="text" placeholder="{{$item->type}}" value="{{$item->type}}"/>
        <x-input field="price" label="Price" type="text" placeholder="{{$item->price}}" value="{{$item->price}}"/>
    </x-form>
@endsection
@section('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
@endsection
@section('script')
<script>
    $("#role").select2({placeholder: "Pilih Role",});
</script>
@endsection
