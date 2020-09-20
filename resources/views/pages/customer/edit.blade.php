@extends('themes.gentelella')

@section('header', 'Customer')
@section('title', 'Edit')
@section('subtitle', '')

@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('customer.index')}}'>Back</a>
    <x-form action="{{route('customer.update',$customer->id)}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$customer->name}}" value="{{$customer->name}}"/>
        <x-input field="description" label="Description" type="text" placeholder="{{$customer->description}}" value="{{$customer->description}}"/>
    </x-form>
@endpush

@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
    </script>
@endpush