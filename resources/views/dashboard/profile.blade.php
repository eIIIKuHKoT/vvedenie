@extends('adminlte::page')

@section('title', 'Dashboard | Users')


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
                <form role="form" method="post" action="{{action('UserController@store')}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    value="{{$user->email}}"   placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="exampleInputName1">User name</label>
                                <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName1" placeholder="User name">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-xs-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                       placeholder="Password">
                                <label for="exampleInputConfirmPassword1">{{--Confirm password--}}</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputConfirmPassword1"
                                       placeholder="Confirm Password">
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

