<!doctype html>
<html lang="en">
<head>
    @include('admin.layouts.head.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.header.header')
    @include('admin.layouts.sidebar.side')

    @section('main-content')

        @show
    @include('admin.layouts.footer.footer')
</div>

</body>
</html>