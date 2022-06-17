@extends('template.main')

@section('title', 'Data Masyarakat')

@section('breadcrumb')
<div class="pagetitle">
    <h1>Data Masyarakat</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('main')}}">Home</a></li>
        <li class="breadcrumb-item active">Data Masyarakat</li>
    </ol>
    </nav>
</div> 
@endsection

@section('container')
    <table class="table border-collapse text-center">
        <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($masyarakat as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>
                    <button type="button" class="btn btn-primary" onClick="editDataMasyarakat({{ $item->id }})">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" onClick="DeleteData({{ $item->id }})">
                        Delete
                    </button>
                </td>

            </tr>

            @empty 

                <h1 class="text-center">Data Not Found</h1>
            @endforelse
        </tbody>
    </table>
@endsection
    

@section('j_script')
    <script>
        function editDataMasyarakat(id) {
            $.get("{{ url('petugas/edit') }}/" + id, {} , function(data, status) {
                $('#title').html('Edit Akun Masyarakat');
                $('#content').html(data);
                $('#modal').modal('show');
            })
        }

        function updateDataMasyarakat(id) {
            var name = $('.name').val()
            var email = $('.email').val()

            $.ajax({
                type: "get",
                url: "{{ url('petugas/update') }}/" + id,
                data: "name=" + name + "&email=" + email,
                success: function (response) {
                    toastr.success('Data Berhasil Diubah')                    
                    window.location.href = "{{ url('data-masyarakat') }}"
                }
            });

        }

        function DeleteData(id) {
                var name = $('.name').val()
                var email = $('.email').val()

            Swal.fire({
                title: 'Apa Anda Yakin ?',
                text: "Anda tidak akan melihat data ini lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                    type: "get",
                    url: "{{ url('admin/destroy') }}/" + id,
                    data: "name=" + name + "&email=" + email,
                        success: function(data, status) {
                            if(status = '200') {
                                window.location.href = "{{ url('data-masyarakat') }}"
                                Swal.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                                )                            
                            }
                        }, 
                    })
                }

                })
           
        }
    </script>
@endsection