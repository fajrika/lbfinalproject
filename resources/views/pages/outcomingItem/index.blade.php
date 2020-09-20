@extends('themes.gentelella')

@section('header', 'Outcoming Item')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Customer;Description;Created by"/>
@endpush

@push('js')
    <x-table.dt-js data="customer.name;description;created_by.name" button="add;copy;excel;csv;pdf" url="/api/outcomingItem"/>
@endpush