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
                            <h3 class="box-title">Update Admin</h3>
                        </div>

                    @include('includes.errors.error')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
                            {{ csrf_field() }}

                            {{ method_field('PUT') }}
                            <div class="box-body">

                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group">
                                        <label for="name">  User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif  " >
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif ">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif ">
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<label for="password">Password </label>--}}
                                        {{--<input type="password" class="form-control" id="password" name="password" placeholder="Password"  value="@if (old('password')){{ old('password') }}@else{{ $user->password }}@endif ">--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<label for="password_confirmation">Confirm Password </label>--}}
                                        {{--<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">--}}
                                    {{--</div>--}}

                                    <div class="form-group">
                                        <label for="Status">Status </label>
                                        <div class="checkbox">
                                            <label for=""><input type="checkbox" name="status"

                                            @if(old('status') == 1 || $user->status ==1)
                                               checked
                                            @endif
                                           @if(old('status') == 1 )  checked  @endif  value="1"> Status</label>
                                        </div>
                                    </div>



                                    {{--Assign Role--}}
                                    <div class="form-group ">
                                        <label>Assign Role</label>

                                        <div class="row">
                                            @foreach($roles as $role)

                                                <div class="col-lg-3">
                                                    <div class="checkbox">
                                                        <label for=""><input type="checkbox" name="role[]" value="{{ $role->id }}"
                                                            @foreach( $user->roles as $user_role)
                                                                @if($user_role->id == $role->id)
                                                                      checked
                                                                    @endif
                                                                @endforeach


                                                            > {{ $role->role }}</label>
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