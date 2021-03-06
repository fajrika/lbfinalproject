@extends('themes.gentelella')

@section('header', 'User Management')
@section('title', 'List')
@section('subtitle', '')
@push('css')
    <x-table.dt-css/>
@endpush
@push('content')
    <x-table thead="Name;Username;Role;Edit"/>
@endpush
@push('js')
<x-table.dt-js data="name;username;role;edit" button="add;copy;excel;csv;pdf" url="/api/userManagement" />
@endpush