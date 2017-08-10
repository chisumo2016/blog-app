@extends('user.app')

@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Chisumo Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .fa-thumbs-up:hover{
        color:red;
    }
</style>
@endsection


@section('main-content')
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {{--Using Vue--}}
                <posts
                        v-for='value in blog'
                        :title=value.title
                        :subtitle=value.subtitle
                        :created_at=value.created_at
                        :key=value:index
                ></posts>





                {{--NORMAL --}}
                {{--@foreach($posts as $post)--}}

                {{--<div class="post-preview">--}}

                    {{--<a href="{{ route('post', $post->slug) }}">--}}
                        {{--<h2 class="post-title">--}}

                            {{--{{ $post->title }}--}}

                        {{--</h2>--}}
                        {{--<h3 class="post-subtitle">--}}
                            {{--{{ $post->subtitle }}--}}
                        {{--</h3>--}}
                    {{--</a>--}}

                    {{--<p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{ $post->created_at->diffForHumans() }}--}}
                        {{--<a href="">--}}
                            {{--<small>0</small>--}}
                            {{--<i class="fa fa-thumbs-up" aria-hidden="true"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}

                {{--</div>--}}

                {{--@endforeach--}}

                <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{ $posts->links() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
@endsection



@section('footer')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection