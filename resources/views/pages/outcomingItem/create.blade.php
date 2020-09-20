@extends('themes.gentelella')

@section('header', 'Outcoming Item')
@section('title', 'Add')
@section('subtitle', '')

@push('css')
    <link href="/asset/gentelella/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endpush
@push('content')
    <a class="btn btn-success" style="float: right" href='{{ route('outcomingItem.index')}}'>Back</a>
    <x-form action="{{route('outcomingItem.store')}}" method="POST">
        <x-input type="select" field="customer_id" label="Customer" placeholder="Input Customer" dataSelect='{!! json_encode($customers) !!}'/>
        <x-input type="datetime-local" field="process_date" label="Process Date" placeholder="Input Process Date"/>
        <x-input field="ppn" label="PPN" type="select" dataSelect='[{"view":"Unuse","value":0},{"view":"Use","value":1}]' attr="required"/>
        <x-input type="number" field="ppnrp" label="PPN Rupiah" placeholder="0" attr="readonly"/>
        <x-input type="number" field="grandTotal" label="Grand Total" placeholder="0" attr="readonly"/>
        <x-input type="number" field="finalTotal" label="Final Total" placeholder="0" attr="readonly"/>
        <x-input type="textarea" field="description" label="Description" placeholder="Input Description"/>
        <hr>

        <div id="root">
            <div class="el col-md-12">
                <div class="clearfix"></div>
                <b>Item</b>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Item</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control item_id" name="item_id[]">
                            <option></option>
                            @foreach ($items as $item)
                                <option price="{{$item->price}}" value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>    
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Price</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" class="form-control priceEl" name="priceEl[]" placeholder="0" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Quantity</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" class="form-control quantity" name="quantity[]" placeholder="0" value="1" required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" class="form-control total" name="total[]" placeholder="0" value="0" readonly required>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea type="number" class="form-control descriptionEl" name="descriptionEl[]"></textarea>
                    </div>
                </div>
                <div class="col-md-2" style="margin:auto;float:none">
                    <button class="btn btn-danger col-md-12 removeItem">Remove Item</button>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <div class="col-md-2" style="margin:auto;float:none">
            <button id="addItem" class="btn btn-info col-md-12">Add Item</button>
        </div>
        <div class="clearfix"></div>
    </x-form>
@endpush
@push('js')
    <script src="/asset/gentelella/vendors/select2/dist/js/select2.min.js"></script>
    <script>
        var ppn = false;
        const el = $('#root').html();
        const calculate = () => {
            let grandTotal = 0;
            $('.el').each(i => {                
                grandTotal += parseInt($('.el').eq(i).find('.total').val())
            });
            $("#grandTotal").val(grandTotal??0);
            let ppnrp = 0;
            if(ppn === true)
                ppnrp = Math.round(grandTotal * 0.1)
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
        
        $("body").on("change",".item_id,.quantity",function(e){
            console.log($(this));
            let price = $(this).parents('.el').find('.item_id').find("option:selected").attr("price");
            let quantity = $(this).parents('.el').find('.quantity').val();
            let total = parseInt(price) * parseInt(quantity);
            $(this).parents('.el').find('.priceEl').val(price);
            $(this).parents('.el').find('.total').val(total);
            
            calculate();
        })
        $("body").on("change",".priceEl",function(e){
            let price = $(this).val();
            let quantity = $(this).parents('.el').find('.quantity').val();
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
        // $("body").on("change",".quantity",function(e){

        // });
        $("select").select2({placeholder: "Pilih"});
        // $("#ppn").select2({placeholder: "",});
    </script>
@endpush