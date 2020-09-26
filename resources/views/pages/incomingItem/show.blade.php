@extends('themes.gentelella')

@section('header', 'Incoming Item')
@section('title', 'Add')
@section('subtitle', '')

@push('css')
    <link rel="stylesheet" type="text/css" href="/asset/datatables/main.min.css" />
    <link href="/asset/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <x-print.css/>
@endpush
@push('content')
    <a class="btn btn-success d-print-none" style="float: right" href='{{ route('incomingItem.index')}}'>Back</a>
    <a class="btn btn-primary d-print-none" style="float: right" href="#" onclick="window.print()">Print</a>
    <x-form class="form-horizontal col-lg-12 form-label-left print d-block" action="{{route('incomingItem.store')}}" method="POST">
        <div class="col-md-6">
            <x-input class="col-md-9" type="text" field="supplier_id" label="Supplier" placeholder="Input Supplier" value="{{$incomingItem->supplier->name}}" attr="disabled"/>
            <x-input class="col-md-9" type="text" field="process_date" label="Process Date" placeholder="Input Process Date" value="{{$incomingItem->process_date}}" attr="disabled"/>
            <x-input class="col-md-9" type="textarea" field="description" label="Description" placeholder="Input Description" rows="3" value="{{$incomingItem->description}}" attr="disabled"/>
        </div>
        <div class="col-md-6">
            <x-input class="col-md-9" field="ppn" label="PPN" type="text" placeholder="Choose a config" value="{{$incomingItem->ppn?'Use':'Unuse'}}" attr="disabled"/>
            <x-input class="col-md-9" type="number" field="ppnrp" label="PPN Rupiah" placeholder="0" value="{{$incomingItem->ppn}}" attr="disabled"/>
            <x-input class="col-md-9" type="number" field="grandTotal" label="Grand Total" placeholder="0" value="{{$incomingItem->grand_total}}" attr="disabled"/>
            <x-input class="col-md-9" type="number" field="finalTotal" label="Final Total" placeholder="0" value="{{$incomingItem->final_total}}" attr="disabled"/>
        </div>
        <div>
            <div class="col-md-12">
                <div class="clearfix"></div>
                <b>Item List</b>
                <div class="clearfix"></div>
                <table class="table">
                    <thead>
                        <tr>
                            <td style="width: 30%">Item</td>
                            <td style="width: 25%">Price</td>
                            <td style="width: 10%">Quantity</td>
                            <td style="width: 25%">Total</td>
                        </tr>
                    </thead>
                    <tbody id="root">
                        @foreach ($incomingItem->details as $el)
                            <tr class="el">
                                <td>
                                    <input type="text" class="form-control" value="{{$el->item->name}}" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{$el->price}}" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{$el->quantity}}" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{$el->total}}" value="0" readonly disabled>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </x-form>
@endpush

@push('js')
    <script src="/asset/datatables/pdfmake.min.js"></script>
    <script src="/asset/datatables/vfs.min.js"></script>
    <script src="/asset/datatables/main.min.js"></script>
@endpush