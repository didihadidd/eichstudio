<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    @stack('prepend-style')

    <!--Style -->
    @include('includes.style')
    @stack('addon-style')

  </head>
  <body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->

    <!-- Navbar-->
    @include('includes.navbar')

    <!--Header -->
    @yield('content')

    <!--Footer -->
    @include('includes.footer')

    @stack('prepend-script')
    <!-- <script src="frontend/libraries/retina/retina.js"></script>  buat hd gambar, retina.js itu ga dikompress dulu jd originalnya aja-->
    @include('includes.script')

    @stack('addon-script')

  </body>
</html>
