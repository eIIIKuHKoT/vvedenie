@extends('adminlte::page')

@section('title', 'Dashboard | Team members')


@section('content_header')
    <h3>Users</h3>
@stop
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Create new user</h4>
                </div>
                @if ($errors->any())
                    <div class="col-md-12">
                        <div class="col-xs-6">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
            @endif
            <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{action('TeamMemberController@store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="full_name">Full name</label>
                                <input type="text" name="full_name" class="form-control" id="full_name"
                                       placeholder="Full name">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="role">Position</label>
                                <input type="text" name="role" class="form-control" id="role" placeholder="Position">
                                <p class="help-block">Position of the employee</p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"
                                          placeholder="Description ..."></textarea>
                                <p class="help-block">Employee description</p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="photo">Photo</label>
                                <input type="file" id="photo" name="photo">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
    </div>
@stop

@section('js')
    <script>

    </script>
@stop

