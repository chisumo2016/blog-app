@extends('user.app')


@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Contact Form')
@section('sub-heading','Learn Together and Grow Together')

@section('main-content')
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <h1>Contact Me</h1>
              <hr>
              @include('includes.messages.message')
              <form action="{{ route('contact') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="email"> Email :</label>
                      <input type="text" id="email" name="email" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="subject">Subject :</label>
                      <input type="text" id="subject" name="subject" class="form-control">
                  </div>

                  <div class="form-group">
                      <label for="message">Message :</label>
                      <textarea name="message" id="message" cols="30" rows="10" class="form-control"> message here ........</textarea>
                  </div>

                  <input type="submit" value="Send Message" class="btn btn-primary">



              </form>
          </div>
      </div>
  </div>

@endsection