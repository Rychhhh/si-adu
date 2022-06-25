@extends('template.main')

@section('title', 'Dashboard')

@section('breadcrumb')
     <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div> 
@endsection

@section('container')
<section class="section dashboard">
  <div class="row">

    <div class="col-xxl-4 col-sm-12 col-xl-12 col-md-6">
      <div class="card info-card sales-card">

        <div class="card-body">
          <h5 class="card-title">Total User</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              @php
                  use App\Models\User;
              @endphp
              <h6>{{ User::all()->count() }}</h6>
              <span class="text-success small pt-1 fw-bold">{{ mt_rand(80, 100) }}%</span>

            </div>
          </div>
        </div>

      </div>
    </div>

  

    @php
        use App\Models\Pengajuan as TotalPengajuan;

        $allDataPengajuan = TotalPengajuan::all()->count();
    @endphp

    {{-- User --}}
    <div class="col-xxl-4 col-sm-12 col-xl-12">

      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Total Pengaduan</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $allDataPengajuan }}</h6>
              <span class="text-secondary small pt-1 fw-bold">{{ mt_rand(50,100) }} %</span> 

            </div>
          </div>

        </div>
      </div>

    </div>

    @if (Auth::user()->role === 'pengaju')
      <div class="col-xxl-4 col-sm-12 col-xl-12">

        <a href="{{ url('ajukan-pengaduan') }}" class="btn btn-info " style="width: 50%; ">Ingin Mengisi Aduan Masyarakat ? </a>
      </div>
    @endif


      @php
        use App\Models\Pengajuan;

        $allDataPengajuan = Pengajuan::all()->count();

        $belumDiproses = Pengajuan::where('status' , 'Belum Diproses')->count();
        $sedangDiproses = Pengajuan::where('status' , 'Sedang Diproses')->count();
        $selesaiDiproses = Pengajuan::where('status' , 'Selesai')->count();
        $jumlahTanggapan = Pengajuan::where('tanggapan')->count();

      @endphp

    @if (Auth::user()->role === 'petugas' || Auth::user()->role === 'admin')

    {{-- User --}}
    <div class="col-xxl-4 col-sm-12 col-xl-12">

      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Pengajuan Diproses</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
             
              <h6>{{ $belumDiproses }}</h6>
              <span class="text-secondary small pt-1 fw-bold">{{ mt_rand(50,100) }} %</span> 

            </div>
          </div>

        </div>
      </div>

    </div>
    {{-- User --}}
    <div class="col-xxl-4 col-sm-12 col-xl-12">

      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Sedang Diproses</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
             
              <h6>{{ $sedangDiproses }}</h6>
              <span class="text-secondary small pt-1 fw-bold">{{ mt_rand(50,100) }} %</span> 

            </div>
          </div>

        </div>
      </div>

    </div>
    {{-- User --}}
    <div class="col-xxl-4 col-sm-12 col-xl-12">

      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Selesai Diproses</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
             
              <h6>{{ $selesaiDiproses }}</h6>
              <span class="text-secondary small pt-1 fw-bold">{{ mt_rand(50,100) }} %</span> 

            </div>
          </div>

        </div>
      </div>

    </div>


    <div class="col-xxl-4 col-sm-12 col-xl-12">

      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Selesai Diproses</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
             
              <h6>{{ $jumlahTanggapan }}</h6>
              <span class="text-secondary small pt-1 fw-bold">{{ mt_rand(50,100) }} %</span> 

            </div>
          </div>

        </div>
      </div>

    </div>

    @endif


  </div>
</section>
@endsection