<table class="{{ $class ?? 'table table-striped table-list jambo-table bulk_action' }}" style="width:100%">
    <tfoot>
        <tr>
            @foreach (explode(';', $thead) as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </tfoot>
    <thead>
        <tr>
            @foreach (explode(';', $thead) as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
    </thead>
</table>
