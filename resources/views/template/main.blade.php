<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body>

  {{-- <video id="background-cover" autoplay loop muted poster poster="https://cdn.akamai.steamstatic.com/steamcommunity/public/images/items/1406990/0fa275e7aa6514e876d5c34482010e9e6c7051f3.jpg">
  <source src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/items/1406990/915b1b4a05133186525a956d7ca5c142a3c3c9f3.webm" type="video/webm">
  </video> --}}

 @include('template.header-content')

 @include('template.sidebar')  

  <main id="main" class="main">

    @yield('breadcrumb')
   

      @yield('container')

  </main><!-- End #main -->

  @include('template.footer')


  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title"></h5>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div id="content"></div>
        </div>
      </div>
    </div>
  </div>


  {{-- Jquery  --}}

  {{-- Toastr ANd Sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.3/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/quill/quill.min.jss') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

  @include('sweetalert::alert')
  @yield('j_script')

  <script>
      function tambahPetugas() {
        $.get("{{ url('petugas/create') }}", {}, function(data,status) {
            $('#title').html('Tambah Petugas');
            $('#content').html(data);
            $('#modal').modal('show');
        })
      }

      function simpanDataPetugas() {
        var name = $('.name').val()
        var email = $('.email').val()
        var password = $('.password').val()
        var role = $('.role').val()

        $.ajax({
          type: "get",
          url: "{{ url('petugas/store') }}",
          data: "name=" + name + "&email=" + email + "&password=" + password + "&role=" + role,
          success: function (response) {
              window.location.href = "{{ url('data-semua-user') }}"
              toastr.success('Data Berhasil Disimpan')
          }
        });
      }

  </script>
</body>

</html>