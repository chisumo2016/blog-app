@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css">') }}">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           @include('admin.layouts.pageHead')
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Users</h3>
                    
                    <a href="{{ route('user.create') }}" class="col-lg-offset-6 btn btn-success">Add New</a>

                    @include('includes.messages.message')

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>User Name</th>
                                    <th>Assign Role</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                               {{ $role->role }}
                                             @endforeach
                                        </td>

                                        <td>{{ $user->status ? 'Active' : 'Not Active'}}</td>


                                        <td><a href="{{ route('user.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td>

                                            <form  id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="post" >

                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}

                                                <a href="" onclick="
                                                        if(confirm('Are you sure ,You Want to delete this ? '))
                                                        {
                                                        event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();
                                                        }
                                                        else{
                                                        event.preventDefault()
                                                        }"><span class="glyphicon glyphicon-trash"></span></a>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S. No</th>
                                    <th>User Name</th>
                                    <th>Assign Roles</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();

        });
    </script>

@endsection