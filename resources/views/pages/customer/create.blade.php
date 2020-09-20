@extends('themes.gentelella')

@section('header', 'Customer')
@section('title', 'Add')
@section('subtitle', '')

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('item.index')}}'>Back</a>
    <x-form action="{{route('item.store')}}" method="POST">
        <x-input type="text" field="name" label="Name" placeholder="Input Name"/>
        <x-input type="textarea" field="description" label="Description" placeholder="Input Description"/>
        {{-- <x-input field="type" label="Type" type="text" placeholder="Input Type"/>
        <x-input field="price" label="Price" type="number" placeholder="Input Price"/> --}}
    </x-form>
@endpush
