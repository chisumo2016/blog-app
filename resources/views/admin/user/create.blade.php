@extends('admin.layouts.app')

@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Admin</h3>
                        </div>

                    @include('includes.errors.error')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('user.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">  User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password </label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password </label>
                                        <input type="password" class="form-control" id="confirm_password" name="password" placeholder="Confirm Password">
                                    </div>

                                    {{--Assign Role--}}
                                    <div class="form-group ">
                                        <label>Assign Role</label>

                                        <div class="row">
                                            @foreach($roles as $role)

                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->role }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                        {{--<select name="role" id="" class="form-control">--}}
                                            {{--<option value="0">Editor</option>--}}
                                            {{--<option value="1">Publisher</option>--}}
                                            {{--<option value="3">Write</option>--}}
                                        {{--</select>--}}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a type="button" href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection