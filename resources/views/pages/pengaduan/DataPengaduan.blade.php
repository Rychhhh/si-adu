@extends('template.main')


@section('title', 'All Data')
    
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('main')}}">Home</a></li>
            <li class="breadcrumb-item active">All Data</li>
        </ol>
        </nav>
    </div> 
@endsection

@section('container')
<a href="{{ url('generate/online_pdf') }}" class="btn btn-success my-3">Online PDF</a>
<a href="{{ url('generate/download_pdf') }}" class="btn btn-success my-3">Download PDF</a>

<table class="table border-collapse text-center">
    <thead class="text-white bg-secondary">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Laporan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Foto</th>
        <th scope="col">Status</th>
            <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pengajuans as $item)
            
        <tr>
            <th scope="row" class="p-3">{{ $loop->iteration }}</th>
            <td class="p-3">{!! str()->limit($item->laporan, 20) !!}</td>
            <td class="p-3">{{ date('D - d M Y',$item->created_at->timestamp) }}</td>
            <td class="p-3">
                <img src="{{ asset('storage/laporan/'. $item->photo) }}" alt="{{ $item->name }}" width="200" height="100">
            </td>
            {{-- <td class="btn btn-secondary bg-danger m-3">{{ $item->status }}</td> --}}
            @if ($item->status === 'Belum Diproses')
            <td class="badge mt-2 rounded-pill bg-danger">{{ $item->status }}</td>
            @else
               <td class="badge mt-2 rounded-pill bg-primary">{{ $item->status }}</td>
                
            @endif
            <td>
                <a href="{{ url('pengaduan/'. $item->id ) }}">
                    👁
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection