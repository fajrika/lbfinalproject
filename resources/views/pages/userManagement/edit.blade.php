@extends('themes.gentelella')

@section('header', 'User Management')
@section('title', 'Edit')
@section('subtitle', '')
@push('css')
    <x-select2.css/>
@endpush
@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('userManagement.index')}}'>Back</a>
    <x-form action="{{route('userManagement.update',$user->id)}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$user->name}}" value="{{$user->name}}"/>
        <x-input field="username" label="Username" type="text" placeholder="{{$user->username}}" value="{{$user->username}}"/>
        <x-input field="password" label="Password" type="password" placeholder="kosongkan jika tidak ingin merubah" />
        <x-input field="role" label="Role" type="select" dataSelect='[{"view":"Admin","value":0},{"view":"Warehouse","value":1}]'/>
    </x-form>
@endpush
@push('js')
    <x-select2.js/>
    <script>
        $('#role').val({{$user->role}}).trigger('change');
    </script>
@endpush
