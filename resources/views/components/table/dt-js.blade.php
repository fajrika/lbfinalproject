<?php
    $columns = explode(";",$data);
    if(in_array("edit",$columns)) $edit = 1;
    if(in_array("delete",$columns)) $delete = 1;
?>

<script src="/asset/datatables/pdfmake.min.js"></script>
<script src="/asset/datatables/vfs.min.js"></script>
<script src="/asset/datatables/main.min.js"></script>
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
