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
                            <h3 class="box-title">Post </h3>

                            <a href="{{ route('post.create') }}" class="col-lg-offset-6 btn btn-success">Add New</a>
                        </div>

                    @include('includes.errors.error')
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('post.update',$post->id) }}" method="post">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Post SubTitle</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle"  value="{{ $post->subtitle }}" placeholder="Enter Sub Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug}}"  placeholder="Slug">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="exampleInputFile">

                                    </div>
                                    <br><br>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" @if($post->status == 1) checked   @endif>  Publish
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Write Pos Body Here
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                            <i class="fa fa-times"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                                    <textarea class="textarea" placeholder="Place some text here" name="body" id="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button" href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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
