@section('script')
    <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js')}}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}""></script>
  <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/now-ui-dashboard.min.js')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endsection