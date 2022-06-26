@extends('template.main')


@section('title', 'Form Pengajuan')
    
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('main')}}">Home</a></li>
            <li class="breadcrumb-item active">Pengajuan Form</li>
        </ol>
        </nav>
    </div> 
@endsection

@section('container')
    <form action="{{ route('post.pengaju') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group mt-3">
            <label for="email">Name :</label>
            <input type="text" class="form-control" name="name" value="{{ ucfirst(Auth::user()->name) }}" readonly>
          </div>
          <div class="form-group mt-3">
            <label for="pwd">Laporan:</label>
            <textarea type="text" class="form-control" name="laporan" required></textarea>
            <script>
            CKEDITOR.replace( 'laporan' )
            </script>
          </div>
          <div class="form-group mt-3">
            <label for="email">Photo :</label>
            <input type="file" class="form-control dropify-media" name="photo" required>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

@section('j_script')
    <script>
      $('.dropify-media').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Drag and drop or click to replace',
                remove: 'Remove',
                error: 'Ooops, something wrong happended.'
            },
        });
    </script>
@endsection