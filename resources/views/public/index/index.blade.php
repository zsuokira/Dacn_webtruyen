<!DOCTYPE html>
<html lang="vi">
<head>
    <!--Header-->
    <title >Tiểu Thuyết Việt|VietStory</title>
   @include('public.index.header')
</head>
<body  class="body-home">
<div class="page-wrapper">
    <!--NavBar-->
    @include('public.index.navbar')
    <!--Content-->
    @yield('content')
</div>
<!-- Footer -->
@include('public.index.footer')
<!-- Footer -->
</body>
</html>