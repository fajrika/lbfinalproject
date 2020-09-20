@extends('themes.gentelella')

@section('header', 'Item')
@section('title', 'List')
@section('subtitle', '')

@section('css')
    <x-table.dt-css/>
@endsection
@section('content')
    <x-table thead="Code;Name;Type;Price;Created by;Edit"/>
@endsection
@section('script')
    <x-table.dt-js data="code;name;type;price;created_by;edit" button="add;copy;excel;csv;pdf" url="/api/item" />
@endsection