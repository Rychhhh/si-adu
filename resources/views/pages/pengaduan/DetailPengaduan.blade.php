@extends('template.main')

@section('title' , 'Detail Laporan ');

@section('container')
<div class="container-fluid">

    <div class="container">
      <!-- Title -->
      <div class="d-flex justify-content-between align-items-center py-3">
        <a href="{{ url('all-pengaduan') }}" class="h5 mb-0">Back</a> 
      </div>
    
      <!-- Main content -->
      <div class="row">
        <div class="col-lg-12">
          <!-- Details -->
          <div class="card mb-4">
            <div class="card-body p-4">
              <div class="mb-3 d-flex justify-content-between">
                <div>
                  <span class="me-3">{{ $detail->name }}</span>

                  @if ($detail->status === 'Belum Diproses')
                    <span class="badge rounded-pill bg-danger">{{ $detail->status }}</span>
                  @else
                    <span class="badge rounded-pill bg-primary">{{ $detail->status }}</span>
                      
                  @endif
                </div>
              </div>

              <div class="mt-5 d-flex flex-column justify-content-between">
                  <img src="{{ url('storage/laporan/'. $detail->photo) }}"  width="300" height="200" alt="">
                  
                  
                  <div class="mt-5">
                        <h3>Isi Laporan</h3>

                        {!! $detail->laporan !!}
                  </div>
              </div>

              <div class="mt-3 text-center d-flex flex-column justify-content-between">
                  <h3 class="font-bold text-success">Tanggapan</h3>

                  @if ($detail->tanggapan === null)
                      <div class="bg-info p-2 rounded-pill text-white container" style="width: 50%">
                          Belum Ada Tanggapan 
                      </div>
                  @else
                       <h3 class="text-center"> {{ $detail->tanggapan }} </h3>                     
                  @endif


              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="btn btn-danger">Export To PDF</div>

      @if (Auth::user()->role === 'petugas')

      {{-- For Tanggapan Only Petugas --}}
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle">Beri Tanggapan</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
              <div id="modalContent">

                <div class="form-floating mb-5">
                 <input type="text" name="tanggapan" class="tanggapan form-control" style="height: 100px;" id="">
                  <label for="floatingTextarea2">Berikan Tanggapan</label>
                </div>

                <div class="form-group">
                  <label for="name">Status </label>

                  @php
                      $dataStatus = [
                          'Belum Diproses', 'Sedang Diproses', 'Selesai'
                        ]
                  @endphp
                  <select name="status" class="status" id="">
                    @foreach ($dataStatus as $item)
                        <option name={{ $item }}>{{ $item }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button  class="btn btn-primary" onClick="update({{ $detail->id }})">Save</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
         Beri Tanggapan
      </button>

      @endif

    </div>
      </div>
@endsection
    

@section('j_script')
    <script>
        $(document).ready(function() {
            read();
        });

        function read() {
          $.get('all-pengaduan');
        }

        function update(id) {
          var tanggapan = $('.tanggapan').val()
          var status = $('.status').val()

          $.ajax({
            type: "get",
            url: "{{ url('pengaduan/tanggapan') }}/" + id,
            data: "tanggapan=" + tanggapan + 
                              "&status=" + status,
            success: function(data) {
              $('.close').click();
              toastr.success('Tanggapan Masuk');
              window.location.href = "{{ url('pengaduan' ) }}/" + id
            }
          });

        }
    </script>
@endsection