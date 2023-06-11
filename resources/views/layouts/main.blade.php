<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
    <title>@yield('title') | Pool Mining</title>

    <!-- favicon -->

    <link rel="apple-touch-icon" href="">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/epesantren.png') }}" />

    <!-- Fungsi stack untuk menyisipkan style atau script untuk file tertentu -->
    @stack('before-style')

    @include('includes.style')

    @stack('after-style')
</head>

<body>
    
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
          <!-- Menu -->

    @include('includes.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('includes.navbar')
          

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

    @yield('content')

    @include('includes.footer')

    
    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>

    @stack('before-script')

    @include('includes.script')

    @stack('after-script')

</body>

</html>