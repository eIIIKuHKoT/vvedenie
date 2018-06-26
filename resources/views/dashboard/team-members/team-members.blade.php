@extends('adminlte::page')

@section('title', 'Dashboard | Team Members')


@section('content_header')
    <h2>Team members</h2>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                   {{-- <h3>Team members table</h3>--}}
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                        <a class="btn btn-reddit" style="margin-bottom:25px;" href="{{action('TeamMemberController@create')}}">Add new</a>
                        <tr>
                            @foreach( $listing_cols as $col )
                                <th>{{ucfirst($col) }}</th>
                            @endforeach
                            <th class="text-right" width="10%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $members as $member )
                            <tr>

                                <td>{{$member->id}}</td>
                                <td>{{$member->full_name}}</td>
                                <td>{{$member->role}}</td>
                                <td><img src="{{asset($member->photo)}}"></td>
                                <td>{{$member->description}}</td>
                                <td>{{$member->created_at}}</td>
                                <td>{{$member->updated_at}}</td>
                                <td>$320,800</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $("#example1").DataTable({
            /*processing: true,
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
               /!* {orderable: false, targets: [5]},*!/
                /!*{className: "text-right", "targets": [6]}*!/
            ],*/
        });

    </script>
@stop

