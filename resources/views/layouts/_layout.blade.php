<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template/assets/') }}" data-template="vertical-menu-template-free">


<head>
    @include('layouts.__meta')
    <title>@yield('title')</title>

    @stack('before-style')
    <!-- Favicon -->
    @include('layouts.__style')
    <!-- Helpers -->
    @stack('after-style')
</head>

<body>
    <!-- Content -->
    @yield('content')
    <!-- / Content -->

    @stack('before-script')
    @include('layouts.__script')
    @stack('after-script')
</body>

</html>
