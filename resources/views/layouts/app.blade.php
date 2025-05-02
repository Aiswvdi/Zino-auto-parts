<!DOCTYPE html>

@if (Request::is('rtl'))
  <html dir="rtl" lang="ar">
@else
  <html lang="en">
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
      <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Zino Auto Parts</title>

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100
    @php echo Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '') @endphp">

    @auth
    {{-- Sidebar --}}
    @include('layouts.navbars.auth.sidebar')

    {{-- Main Content --}}
    <main class="main-content position-relative border-radius-lg ps">

      {{-- Navbar --}}
      @include('layouts.navbars.auth.nav')

      {{-- Flash Message --}}
      @if(session('success'))
        <div class="alert alert-success position-fixed top-0 end-0 m-3 z-index-3">
          {{ session('success') }}
        </div>
      @endif

      {{-- Page Content --}}
      <div class="container-fluid py-4">
        @yield('auth')
        @yield('content')
      </div>
    </main>
  @endauth

  @guest
    @yield('guest')
  @endguest
  <!-- Core JS Files -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  @stack('rtl')
  @stack('dashboard')

  <script>
    if (navigator.platform.indexOf('Win') > -1) {
      let scrollElement = document.querySelector('#sidenav-scrollbar');
      if (scrollElement) {
        Scrollbar.init(scrollElement, { damping: 0.5 });
      }
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>

</body>
</html>
