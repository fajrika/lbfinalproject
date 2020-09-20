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
        <x-input type="select" field="item_id" label="Item Name" placeholder="Input Name" attr="required" dataSelect='{!! json_encode($item) !!}'/>
        <x-input type="text" field="quantity" label="Quantity" placeholder="Input Quantity" attr="required"/>
        <x-input type="text" field="price" label="Price" placeholder="Input Price" attr="required"/>
        <x-input type="datetime-local" field="process_date" label="Process Date" placeholder="Input Process Date" attr="required"/>
        <x-input type="text-area" field="description" label="Description" placeholder="Input Description" attr="required"/>
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

