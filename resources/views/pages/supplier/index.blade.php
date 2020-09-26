@extends('themes.gentelella')

@section('header', 'Supplier')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Name;Description;Created by;Created at;Edit;Delete"/>
@endpush

@push('js')
    <x-table.dt-js data="name;description;created_by.name;created_at;edit;delete" button="add;copy;excel;csv;pdf" url="/api/supplier" sort=3/>
@endpush