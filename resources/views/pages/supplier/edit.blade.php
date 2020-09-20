@extends('themes.gentelella')

@section('header', 'Supplier')
@section('title', 'Edit')
@section('subtitle', '')

@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('supplier.index')}}'>Back</a>
    <x-form action="{{route('supplier.update',$supplier->id)}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$supplier->name}}" value="{{$supplier->name}}"/>
        <x-input field="description" label="Description" type="textarea" placeholder="{{$supplier->description}}" value="{{$supplier->description}}"/>
    </x-form>
@endpush

@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
    </script>
@endpush