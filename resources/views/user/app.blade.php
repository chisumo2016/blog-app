<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.layouts.head.head')

</head>

<body>

<!-- Navigation -->
@include('user/layouts/navigation/nav')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
@include('user/layouts/header/header')

<!-- Main Content -->

  @section('main-content')

      @show
<!-- Footer -->
@include('user/layouts/head/footer')

</body>

</html>
