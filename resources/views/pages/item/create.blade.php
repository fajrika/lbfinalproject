@extends('themes.gentelella')

@section('header', 'Item')
@section('title', 'Add')
@section('subtitle', '')

@section('content')
    <a class="btn btn-success" style="float: right" href='{{ route('item.index')}}'>Back</a>
    <x-form action="{{route('item.store')}}" method="POST">
        <x-input field="code" label="Code" type="text" placeholder="Input Code"/>
        <x-input field="name" label="Name" type="text" placeholder="Input Name"/>
        <x-input field="type" label="Type" type="text" placeholder="Input Type"/>
        <x-input field="price" label="Price" type="number" placeholder="Input Price"/>
    </x-form>
@endsection
