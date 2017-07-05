@extends('admin.layouts.app')

@section('headSection')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
    @endsection

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
                                        <div class="pull-right">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image">
                                        </div>

                                        <div class="checkbox pull-left">
                                            <label>
                                                <input type="checkbox" name="status" value="1" @if($post->status == 1)  {{ 'checked' }} @endif>   Publish
                                            </label>
                                        </div>

                                    </div>
                                    <br><br>

                                    <div class="form-group" style="margin-top: 18px;">
                                        <label>Select Tag</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                   @foreach($post->tags as $postTag)
                                                      @if($postTag->id == $tag->id)
                                                           selected
                                                        @endif
                                                       @endforeach

                                                >{{ $tag->name }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"

                                                            @foreach($post->categories as $postCategory)
                                                            @if($postCategory->id == $category->id)
                                                            selected
                                                            @endif
                                                            @endforeach

                                                    >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
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

                                    <textarea class="textarea" placeholder="Place some text here" name="body" id="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" >{{ $post->body }}</textarea>

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

@section('footerSection')
    <!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>'}}">

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    <script >
        $(document).ready(function(){
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@endsection