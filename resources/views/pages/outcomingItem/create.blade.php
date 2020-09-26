@extends('themes.gentelella')

@section('header', 'Incoming Item')
@section('title', 'Add')
@section('subtitle', '')

@push('css')
    <link rel="stylesheet" type="text/css" href="/asset/datatables/main.min.css" />
    <link href="/asset/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <x-select2.css/>
    <style type="text/css">
        .print:last-child {page-break-after: auto}
        @media print {
            ::-webkit-input-placeholder {color: transparent;text-shadow:none}
            :-moz-placeholder {color: transparent;text-shadow:none}
            ::-moz-placeholder {color: transparent;text-shadow:none}
            :-ms-input-placeholder {color: transparent;text-shadow:none}
            ::placeholder {color: transparent !important}
        }
    </style>
@endpush
@push('content')
    <a class="btn btn-success d-print-none" style="float: right" href='{{ route('outcomingItem.index')}}'>Back</a>
    <x-form class="form-horizontal col-lg-12 form-label-left print d-block" action="{{route('outcomingItem.store')}}" method="POST">
        <div class="col-md-6">
            <x-input class="col-md-9" type="select" field="customer_id" label="Customer" placeholder="Input Customer" dataSelect='{!! json_encode($customers) !!}'/>
            <x-input class="col-md-9" type="datetime-local" field="process_date" label="Process Date" placeholder="Input Process Date"/>
            <x-input class="col-md-9" type="textarea" field="description" label="Description" placeholder="Input Description" rows="3"/>
        </div>
        <div class="col-md-6">
            <x-input class="col-md-9" field="ppn" label="PPN" type="select" placeholder="Choose a config" dataSelect='[{"view":"Unuse","value":0},{"view":"Use","value":1}]' attr="required"/>
            <x-input class="col-md-9" type="number" field="ppnrp" label="PPN Rupiah" placeholder="0" attr="readonly"/>
            <x-input class="col-md-9" type="number" field="grandTotal" label="Grand Total" placeholder="0" attr="readonly"/>
            <x-input class="col-md-9" type="number" field="finalTotal" label="Final Total" placeholder="0" attr="readonly"/>
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
                            <td class="d-print-none" style="width: 10%">Delete</td>
                        </tr>
                    </thead>
                    <tbody id="root">
                        <tr class="el">
                            <td>
                                <select class="form-control item_id" name="item_id[]">
                                    <option selected disabled>Choose a item</option>
                                    @foreach ($items as $item)
                                        <option price="{{$item->price}}" value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>    
                            </td>
                            <td>
                                <input type="number" class="form-control priceEl" name="priceEl[]" placeholder="0" required>
                            </td>
                            <td>
                                <input type="number" class="form-control quantity" name="quantity[]" placeholder="0" value="1" required>
                            </td>
                            <td>
                                <input type="number" class="form-control total" name="total[]" placeholder="0" value="0" readonly required>
                            </td>
                            <td class="d-print-none">
                                <button class="removeItem btn btn-danger col-md-12">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <div class="col-md-2 d-print-none" style="margin:auto;float:none">
            <button id="addItem" class="btn btn-info col-md-12">Add Item</button>
        </div>
        <div class="clearfix"></div>
    </x-form>
@endpush

@push('js')
    <script src="/asset/datatables/pdfmake.min.js"></script>
    <script src="/asset/datatables/vfs.min.js"></script>
    <script src="/asset/datatables/main.min.js"></script>
    <x-select2.js/>
    <script>
        $(function(){
            $("#table").DataTable();
        })
        var ppn = false;
        const el = $('#root').html();
        const calculate = () => {
            let grandTotal = 0;
            $('.el').each(i => {                
                grandTotal += parseInt($('.el').eq(i).find('.total').val())
            });
            $("#grandTotal").val(grandTotal??0);
            let ppnrp = 0;
            if(ppn){
                ppnrp = Math.round(grandTotal * 0.1)
            }
            $("#ppnrp").val(ppnrp);
            let finalTotal = parseInt($("#ppnrp").val()) + parseInt($("#grandTotal").val())
            $("#finalTotal").val(finalTotal);

        }
        $("#ppn").change(function(){
            if($(this).val() == 1) ppn = true
            else ppn = false
            calculate();
        });
        $("#addItem").click(function(e){
            e.preventDefault();
            $("#root").append(el);
            $("select").select2({placeholder: "Pilih"});
        })
        $("body").on("click",".removeItem",function(e){
            e.preventDefault();
            $(this).parents('.el').remove()
        })
        
        $("body").on("change",".item_id",function(e){
            console.log($(this));
            let price = $(this).find("option:selected").attr("price");
            let quantity = $(this).parents('.el').find('.quantity').val();
            let total = parseInt(price) * parseInt(quantity);
            $(this).parents('.el').find('.priceEl').val(price);
            $(this).parents('.el').find('.total').val(total);
            
            calculate();
        })
        $("body").on("change",".priceEl,.quantity",function(e){
            let price = $(this).parents('tr').find('.priceEl').val()
            let quantity = $(this).parents('tr').find('.quantity').val()
            let total = parseInt(price) * parseInt(quantity);
            $(this).parents('.el').find('.priceEl').val(price);
            $(this).parents('.el').find('.total').val(total);
            
            calculate();
        })
        $("body").on("change",".quantity",function(e){
            let price = $(this).parents('.el').find('.priceEl').val();
            let quantity = $(this).parents('.el').find('.quantity').val();
            let total = parseInt(price) * parseInt(quantity);
            $(this).parents('.el').find('.priceEl').val(price);
            $(this).parents('.el').find('.total').val(total);
            
            calculate();
        })
    </script>
@endpush