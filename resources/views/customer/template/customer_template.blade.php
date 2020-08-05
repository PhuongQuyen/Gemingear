<!DOCTYPE html>
<html class="no-js" lang="en">
@include('customer.layout.head')
<body>
{{--include sử dụng cho phần giống nhau, kh thay đổi giữa các trang--}}
@include('customer.layout.login')
@include('customer.layout.menu1')
{{--yield sử dụng cho phần khác nhau giữa các trang--}}
@yield('slider')
@yield('content')
@include('customer.layout.footer')
@include('customer.layout.bot')
@yield('bot')
</body>
</html>
