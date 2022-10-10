<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
  @include('components.navbar')

  @yield('content')

  @include('components.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader">
    <div class="line"></div>
  </div>

  @include('components.scripts')

</body>
</html>
