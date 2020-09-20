@extends('themes.gentelella')

@section('header', 'User Management')
@section('title', 'List')
@section('subtitle', '')
@section('css')
    <x-table.dt-css/>
@endsection
@section('content')
    <x-table thead="Name;Username;Role;Edit"/>
@endsection
@section('script')
<x-table.dt-js data="name;username;role;edit" button="add;copy;excel;csv;pdf" url="/api/userManagement" />
@endsection