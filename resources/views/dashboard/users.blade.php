@extends('adminlte::page')

@section('title', 'Dashboard | Users')


@section('content_header')
    <h2>Users</h2>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3>Users table</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            @foreach( $listing_cols as $col )
                                <th>{{ucfirst($col) }}</th>
                            @endforeach
                          {{--      <th class="text-right" width="10%">Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $("#example1").DataTable({
            processing: true,
            "ajax": {
                "url": "/users",
                "dataSrc": ""
            },
            language: {
                lengthMenu: "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            columnDefs: [
                {targets: [0], visible: false},
               /* {orderable: false, targets: [5]},*/
                /*{className: "text-right", "targets": [6]}*/
            ],
        });
        $('div.dataTables_filter input').addClass('form-control input-sm');
    </script>
@stop

