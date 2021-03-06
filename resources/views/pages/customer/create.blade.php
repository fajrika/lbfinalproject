@extends('themes.gentelella')

@section('header', 'Customer')
@section('title', 'Add')
@section('subtitle', '')

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('customer.index')}}'>Back</a>
    <x-form action="{{route('customer.store')}}" method="POST">
        <x-input type="text" field="name" label="Name" placeholder="Input Name"/>
        <x-input type="textarea" field="description" label="Description" placeholder="Input Description"/>
    </x-form>
@endpush
