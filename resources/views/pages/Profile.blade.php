@extends('template.main')

@section('title', 'Profile')

@section('breadcrumb')
    <div class="pagetitle">
        <h1>Profile {{ ucfirst($user->name) }}</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('main')}}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
        </nav>
    </div> 
@endsection

@section('container')
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('storage/profile_image_file/'. $user->foto_profile) }}" alt="Profile" class="rounded-circle">
            <h2>{{ ucfirst($user->name) }}</h2>
            <h3>Role : {{ ucfirst($user->role) }}</h3>
            
            <div class="text-center">

              <form action="{{ route('ubah-photo') }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
  
                <div class="form-group">
                  <label for="changeProfile">Upload Your Photo</label>
                  <input type="file" name="image" class="form-control-file mb-2" id="changeProfile" style="display:none;">
                  <button type="submit" class="btn btn-success">Upload</button>
                </div>
              </form>
            </div>

          </div>
        </div>  

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">{{ ucfirst($user->about) }}.</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ ucfirst($user->name) }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ ucfirst($user->email) }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Telepon</div>
                    <div class="col-lg-9 col-md-8">{{ ucfirst($user->no_telepon) }}</div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{ ucfirst($user->alamat) }}</div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8">{{ ucfirst($user->role) }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('ubah-data') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{ asset('storage/profile_image_file/'. $user->foto_profile) }}" alt="Profilesss">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="{{ $user->name }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="fullName" value="{{ $user->email }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $user->about }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="no_telepon" class="col-md-4 col-lg-3 col-form-label">No Telepon</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="no_telepon" type="text" class="form-control" id="no_telepon" value="
                      {{ $user->no_telepon }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="alamat" type="text" class="form-control" id="alamat" value="{{ ucfirst($user->alamat)}}" > 
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

            </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

{{-- // lanjut simpan data dan foto di database  --}}
@section('j_script')
    <script>
      function dataProfile(id) {
          $.ajax({
            type: "get",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
              
            }
          });
      }
    </script>
@endsection