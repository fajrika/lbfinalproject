<?php
    $columns = explode(";",$data);
    in_array("edit",$columns) ? $edit = true : $edit = false;
    in_array("delete",$columns) ? $delete = true : $delete = false;
    in_array("show",$columns) ? $show = true : $show = false;
?>

<script src="/asset/datatables/pdfmake.min.js"></script>
<script src="/asset/datatables/vfs.min.js"></script>
<script src="/asset/datatables/main.min.js"></script>
<script>
    $(document).ready(function(){
        $('.table-list tfoot th').each(function(){
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });
        $('.table-list').DataTable({
            dom: 'Blfrtip',
            order: [[ {{$sort??0}}, "desc" ]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
                @if($show)
                {
                    "targets": {{-1*($show+$edit+$delete)}},
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-primary btn-sm col-md-12" href="{{ URL::current() }}/'+full.id+'/">Show</a>')
                },
                @endif
                @if($edit)
                {
                    "targets": {{-1*($edit+$delete)}},
                    "data": null,
                    "render": (data, type, full) => ('<a class="btn btn-primary btn-sm col-md-12" href="{{ URL::current() }}/'+full.id+'/edit">Edit</a>')
                },
                @endif
                @if($delete)
                {
                    "targets": {{-1*($delete)}},
                    "data": null,
                    "render": (data, type, full) => (
                    '<form class="deleteRow" action="{{ URL::current() }}/'+full.id+'" method="post" onsubmit="return confirm(\'Do you really want to delete data?\');">'+
                        '@csrf'+
                        '@method("delete")'+
                        '<button type="submit" class="btn btn-danger btn-sm col-md-12">Delete</button>'+
                    '</form>'
                    )
                }
                @endif
                
            ],
            "columns": [
                @foreach($columns as $column)
                {
                    @if(!in_array($column,['edit','delete','show']))
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
                    $('input', this.footer()).on('keyup change', function(){
                        if (that.search() !== this.value)
                            that.search(this.value).draw();
                    });
                });
            }
        });

    });
</script>
