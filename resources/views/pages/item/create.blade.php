@extends('themes.gentelella')

@section('header', 'Item')
@section('title', 'Add')
@section('subtitle', '')

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('item.index')}}'>Back</a>
    <x-form action="{{route('item.store')}}" method="POST">
        <x-input field="code" label="Code" type="text" placeholder="Input Code"/>
        <x-input field="name" label="Name" type="text" placeholder="Input Name"/>
        <x-input field="category_id" label="Category" type="select" placeholder="Input Name" dataSelect='{!! json_encode($category) !!}' />
        <x-input field="price" label="Price" type="number" placeholder="Input Price"/>
    </x-form>
@endpush
