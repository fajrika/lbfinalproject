@extends('themes.gentelella')

@section('header', 'User Management')
@section('title', 'Add')
@section('subtitle', '')
@push('css')
    <x-select2.css/>
@endpush
@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('userManagement.index')}}'>Back</a>
    <x-form action="{{route('userManagement.store')}}" method="POST">
        <x-input field="name" label="Name" type="text" placeholder="Input Name" attr="required"/>
        <x-input field="username" label="Username" type="text" placeholder="Input Username" attr="required"/>
        <x-input field="password" label="Password" type="password" placeholder="kosongkan jika tidak ingin merubah"  attr="required"/>
        <x-input field="role" label="Role" type="select" dataSelect='[{"view":"Admin","value":0},{"view":"Warehouse","value":1}]' attr="required"/>
    </x-form>
@endpush
@push('js') 
    <x-select2.js/>
@endpush
