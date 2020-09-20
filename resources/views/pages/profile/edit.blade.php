@extends('themes.gentelella')

@section('header', 'Profile')
@section('title', 'Datamu')
@section('subtitle', '')
@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush
@push('content')
    <x-form action="{{route('profile.update',session('auth.id'))}}" method="PUT">
        <x-input field="name" label="Name" type="text" placeholder="{{$user->name}}" value="{{$user->name}}"/>
        <x-input field="username" label="Username" type="text" placeholder="{{session('auth.username')}}" value="{{$user->username}}"/>
        <x-input field="password" label="Password" type="password" placeholder="kosongkan jika tidak ingin merubah" />
        <x-input field="role" label="Role" type="select" dataSelect='[{"view":"Admin","value":0},{"view":"Warehouse","value":1}]'/>
    </x-form>
@endpush
@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
        $('#role').val({{$user->role}}).trigger('change');
    </script>
@endpush
