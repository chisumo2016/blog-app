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
                            <h3 class="box-title">Roles</h3>
                        </div>

                        @include('includes.errors.error')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('role.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="role"> Role</label>
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Title">
                                    </div>
                                    {{--POSTS SIDE PERMISSION--}}

                                    <div class="row">

                                        <div class="col-lg-4">
                                            <label for="name">Posts Permission</label>

                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'post')

                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                        </div>

                                        {{--USER SIDE PERMISSION--}}
                                        <div class="col-lg-4">
                                            <label for="name">Users Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'user')

                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                        </div>

                                        <div class="col-lg-4">
                                            <label for="name">Other Permission</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'other')

                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="checkbox">--}}
                                            {{--<label for=""><input type="checkbox">Create</label>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a type="button" href="{{ route('role.index') }}" class="btn btn-warning">Back</a>
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