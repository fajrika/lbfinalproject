@extends('themes.gentelella')

@section('header', 'Category')
@section('title', 'Add')
@section('subtitle', '')

@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('category.index')}}'>Back</a>
    <x-form action="{{route('category.store')}}" method="POST">
        <x-input type="text" field="name" label="Name" placeholder="Input Name"/>
        <x-input type="textarea" field="description" label="Description" placeholder="Input Description"/>
    </x-form>
@endpush
