@extends('themes.gentelella')

@section('header', 'Item')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Code;Name;Category;Price;Stock;Created by;Created At;Edit;Delete"/>
@endpush

@push('js')
    <x-table.dt-js data="code;name;category.name;price;stock;created_by.name;created_at;edit;delete" button="add;copy;excel;csv;pdf" url="/api/item" sort=6/>
@endpush