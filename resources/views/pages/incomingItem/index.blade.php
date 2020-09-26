@extends('themes.gentelella')

@section('header', 'Incoming Item')
@section('title', 'List')
@section('subtitle', '')

@push('css')
    <x-table.dt-css/>
@endpush

@push('content')
    <x-table thead="Supplier;Grand Total;PPN;Final Total;Description;Process Date;Created At;Created by;Show;Delete"/>
@endpush

@push('js')
    <x-table.dt-js data="supplier.name;grand_total;ppn;final_total;description;process_date;created_at;created_by.name;show;delete" button="add;copy;excel;csv;pdf" url="/api/incomingItem" sort=6/>
@endpush 