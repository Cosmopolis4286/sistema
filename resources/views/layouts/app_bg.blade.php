<!DOCTYPE html>
<html lang="en">
@include('layouts/sections/head')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('sweetalert::alert')
    @include('layouts/sections/nav')
    @yield('modals')
    @include('layouts/sections/scripts')
</body>

</html>
