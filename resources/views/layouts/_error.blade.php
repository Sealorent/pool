<html
  lang="en"
  class="light-style"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Error - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    
    @include('includes.style')

  </head>

  <body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper text-center mt-4">
            <h2 class="mb-2 mx-2">ERROR {{ $title }}</h2>
            <p class="mb-4 mx-2">Oops! 😖 {{ $message }}</p>
            <a href="index.html" class="btn btn-primary">Back to home</a>
            <div class="mt-3">
            <img
                src="{{ asset('template/assets/img/illustrations/page-misc-error-light.png') }}"
                alt="page-misc-error-light"
                width="500"
                class="img-fluid"
                data-app-dark-img="illustrations/page-misc-error-dark.png"
                data-app-light-img="illustrations/page-misc-error-light.png"
            />
            </div>
        </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->


    @include('includes.script')

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>