@extends('themes.gentelella')

@section('header', 'User Management')
@section('title', 'Add')
@section('subtitle', '')
@push('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush
@section('content')
    <a class="btn btn-success" style="float: right" href='{{ route('userManagement.index')}}'>Back</a>
    <x-form action="{{route('userManagement.store')}}" method="POST">
        <x-input field="name" label="Name" type="text" placeholder="Input Name" attr="required"/>
        <x-input field="username" label="Username" type="text" placeholder="Input Username" attr="required"/>
        <x-input field="password" label="Password" type="password" placeholder="kosongkan jika tidak ingin merubah"  attr="required"/>
        <x-input field="role" label="Role" type="select" dataSelect='[{"view":"Admin","value":0},{"view":"Warehouse","value":1}]' attr="required"/>
    </x-form>
@endsection
@push('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        $("#role").select2({placeholder: "Pilih Role",});
    </script>
@endpush
