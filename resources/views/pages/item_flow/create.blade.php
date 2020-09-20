@extends('themes.gentelella')

@section('header', 'Item Flow')
@section('title', 'Add')
@section('subtitle', '')
@section('css')
    <link href="/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    <a class="btn btn-success" style="float: right" href='{{ route('itemFlow.index')}}'>Back</a>
    <x-form action="{{route('itemFlow.store')}}" method="POST">
        <?php
            // dd(json_encode($item));    
        ?>
        <x-input field="item_id" label="Item Name" type="select" placeholder="Input Name" attr="required" dataSelect='{!! json_encode($item) !!}'/>
        <x-input field="quantity" label="Quantity" type="text" placeholder="Input Quantity" attr="required"/>
        <x-input field="price" label="Price" type="text" placeholder="Input Price" attr="required"/>
        <x-input field="process_date" label="Process Date" type="datetime-local" placeholder="Input Process Date" attr="required"/>
        <x-input field="description" label="Description" type="text-area" placeholder="Input Description" attr="required"/>
    </x-form>
@endsection
@section('js')
    <script src="/gentelella/vendors/select2/dist/js/select2.min.js"></script>
@endsection
@section('script')
<script>
    $("#item_id").select2({placeholder: "Pilih Item",});
</script>
@endsection

