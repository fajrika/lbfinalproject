@extends('themes.gentelella')

@section('header', 'Customer')
@section('title', 'Add')
@section('subtitle', '')

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('customer.index')}}'>Back</a>
    <x-form action="{{route('customer.store')}}" method="POST">
        <x-input field="name" label="Name" type="text" placeholder="Input Name"/>
        <x-input field="description" label="description" type="text" placeholder="Input Description"/>
    </x-form>
@endpush
