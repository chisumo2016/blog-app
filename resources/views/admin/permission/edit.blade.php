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
                            <h3 class="box-title">Permissions</h3>
                        </div>

                    @include('includes.errors.error')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('permission.update',$permission->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">

                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="permission">Permission</label>
                                        <input type="text" class="form-control" id="name" name="name"  value="{{ $permission->name }}" placeholder="Permission Title">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a type="button" href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
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