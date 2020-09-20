@extends('themes.gentelella')

@section('header', 'Item Flow')
@section('title', 'List')
@section('subtitle', '')
@section('css')
    <x-table.dt-css/>
@endsection
@section('content')
    <x-table thead="Item Name;Quantity;Price;Process Date;Description;Created By;Edit"/>
@endsection
@section('script')
    <x-table.dt-js data="name;quantity;price;process_date;description;created_by;edit" button="add;copy;excel;csv;pdf" url="/api/itemFlow" />
@endsection