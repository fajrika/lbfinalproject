<?php
    $columns = explode(";",$data);
    if(in_array("edit",$columns)) $edit = 1;
    if(in_array("delete",$columns)) $delete = 1;
?>

<script src="/asset/datatables/pdfmake.min.js"></script>
<script src="/asset/datatables/vfs.min.js"></script>
<script src="/asset/datatables/main.min.js"></script>
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.3/b-colvis-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js">
</script> --}}
<script>
    $(document).ready(()=> {
        $('.table-list tfoot th').each(()=> {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        $('.table-list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                @foreach(explode(";",$button) as $tmp)
                    @if($tmp == 'add')
                    {
                        text: 'Add',
                        className: 'btn btn-primary',
                        titleAttr: 'Add a new record',
                        action: (e, dt, node, config) => {window.location.href = '{{ URL::current() }}/create'}
                    }
                    @else
                    {
                        extend: '{{$tmp}}',
                        className: 'btn btn-dark'
                    }
                    @endif
                    ,
                @endforeach
            ],
            "processing": true,
            "serverSide": true,
            "ajax": { "url": "{{ $url }}" },
            "columnDefs": [
                @if(isset($edit) && isset($delete))
                {
                    "targets": -2,
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-primary" href="{{ URL::current() }}/'+full.id+'/edit">Edit</a>')
                },
                {
                    "targets": -1,
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-danger" href="{{ URL::current() }}'+full.id+'/delete">Delete</a>')
                }
                @elseif(isset($edit))
                {
                    "targets": -1,
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-primary" href="{{ URL::current() }}/'+full.id+'/edit">Edit</a>')
                }
                @elseif(isset($delete))
                {
                    "targets": -1,
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-danger" href="{{ URL::current() }}'+full.id+'/delete">Delete</a>')
                }
                @endif
                
            ],
            "columns": [
                @foreach($columns as $column)
                {
                    @if(!in_array($column,['edit','delete']))
                        "data" : "{{$column}}",
                    @else
                        "data" : "{{$column}}",
                        "searchable" : false,
                    @endif
                },
                @endforeach
            ],
            initComplete: function() {
                var api = this.api();
                api.columns().every(function() {
                    var that = this;
                    $('input', this.footer()).on('keyup change', () => {
                        if (that.search() !== this.value)
                            that.search(this.value).draw();
                    });
                });
            }
        });
    });

</script>
