@extends('template.main')

@section('title', 'Data Admin')

@section('breadcrumb')
<div class="pagetitle">
    <h1>Data Semua User</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('main')}}">Home</a></li>
        <li class="breadcrumb-item active">Data Admin</li>
    </ol>
    </nav>
</div> 
@endsection

@section('container')
    <table class="table border-collapse text-center table-info">
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
            @forelse ($allData as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onClick="editData({{ $item->id }})" >
                            Edit
                        </button>
                        <button class="btn btn-danger" onClick="DeleteData({{ $item->id }})">Delete</button>
                    </td>
                </tr>

            @empty

                <h1 class="text-centre">Data Not Found</h1>
            @endforelse
        </tbody>
    </table>
@endsection
    

@section('j_script')
    <script>

            function editData(id) {
                $.get("{{ url('admin/edit') }}/" + id, {} , function(data, status) {
                    $('#title').html('Edit User');
                    $('#content').html(data);
                    $('#modal').modal('show');vghf
                })
            }

            function updateData(id) {
                var name = $('.name').val()
                var email = $('.email').val()
                var role = $('.role').val()

                $.ajax({
                    type: "get",
                    url: "{{ url('admin/update') }}/" + id,
                    data: "name=" + name + "&email=" + email + "&role=" + role,
                    success: function (response) {
                        window.location.href = "{{ url('data-semua-user') }}"
                        toastr.success('berhasil Diupdate')
                    }
                });
            }

            function DeleteData(id) {
                var name = $('.name').val()
                var email = $('.email').val()
                var role = $('.role').val()

            Swal.fire({
                title: 'Apa Anda Yakin?',
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
                    data: "name=" + name + "&email=" + email + "&role=" + role,
                        success: function(data, status) {
                            if(status = '200') {
                                window.location.href = "{{ url('data-semua-user') }}"
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