@extends('themes.gentelella')

@section('header', 'Supplier')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Name;Description;Created by;Edit;Delete"/>
@endpush

@push('js')
    <x-table.dt-js data="name;description;created_by.name;edit;delete" button="add;copy;excel;csv;pdf" url="/api/supplier" />
@endpush