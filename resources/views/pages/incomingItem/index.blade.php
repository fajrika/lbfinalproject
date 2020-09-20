@extends('themes.gentelella')

@section('header', 'Incoming Item')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Supplier;Description;Created by"/>
@endpush

@push('js')
    <x-table.dt-js data="supplier.name;description;created_by.name" button="add;copy;excel;csv;pdf" url="/api/incomingItem" />
@endpush