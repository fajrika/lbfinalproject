@extends('themes.gentelella')

@section('header', 'Outcoming Item')
@section('title', 'Edit')
@section('subtitle', '')

@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('outcomingItem.index')}}'>Back</a>
    <x-form action="{{route('outcomingItem.update',$outcomingItem->id)}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$outcomingItem->name}}" value="{{$outcomingItem->name}}"/>
        <x-input field="description" label="Description" type="text" placeholder="{{$outcomingItem->description}}" value="{{$outcomingItem->description}}"/>
    </x-form>
@endpush

@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
    </script>
@endpush