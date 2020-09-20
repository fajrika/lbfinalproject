@extends('themes.gentelella')

@section('header', 'Incoming Item')
@section('title', 'Edit')
@section('subtitle', '')

@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('incomingItem.index')}}'>Back</a>
    <x-form action="{{route('incomingItem.update',$incomingItem->id)}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$incomingItem->name}}" value="{{$incomingItem->name}}"/>
        <x-input field="description" label="Description" type="text" placeholder="{{$incomingItem->description}}" value="{{$incomingItem->description}}"/>
    </x-form>
@endpush

@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
    </script>
@endpush