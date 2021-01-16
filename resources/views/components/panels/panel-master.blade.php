<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{config('app.name', 'El Saman')}}</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/panels/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- Toastr -->
  <link href="{{asset('css/tools/toastr.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/tools/toastr.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @if(Auth::guard('admin')->check())
      <x-panels.admin.sidebar></x-panels.admin.sidebar>
    @else
      <x-panels.user.sidebar></x-panels.user.sidebar>
    @endif

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
      <div id="content">

        <x-panels.header></x-panels.header>

        <!-- Begin Page Content -->
        <div class="container-fluid">

              <!-- Page Heading -->
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <x-panels.footer></x-panels.footer>

      <x-panels.logout></x-panels.logout> 

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @yield('modal')

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/panels/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('js/tools/toastr.min.js') }}"></script>
  <script src="{{ asset('js/tools/toastr.js') }}"></script>

  @yield('scripts')

  <script>
  
    @if(Session::has('message'))
        let type = "{{Session::get('alert_type')}}"
        console.log('afdas');
        switch(type) 
        {
          case 'info':
              toastr.info("{{Session::get('message')}}");
          break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
          break;
          case 'warning':
              toastr.warning("{{Session::get('message')}}");
          break;
          case 'error':
              toastr.error("{{Session::get('message')}}");
          break;
        }
    @endif

    @if(count($errors) > 0)
      @foreach($errors->all() as $error)
          toastr.error("{{ $error }}");
      @endforeach
    @endif
  

  </script>

</body>

</html>