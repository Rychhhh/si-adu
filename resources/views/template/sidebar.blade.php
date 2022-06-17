<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('main') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Pages</li>

  
      @if (Auth::user()->role === 'petugas' || Auth::user()->role === 'pengaju')
      <li class="nav-item">
          <a href="{{ url('ajukan-pengaduan') }}" class="nav-link collapsed">
            <i class="bi bi-envelope-open"></i>
            <span>Isi Pengajuan</span>
          </a>
      </li>
      @endif


      <li class="nav-item">
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Main data</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
        @endif
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          @if (Auth::user()->role === 'admin' || Auth::user()->role === 'petugas')
            <li>
              <a href="{{ url('all-pengaduan') }}">
                <i class="bi bi-circle"></i><span>All Pengajuan</span>
              </a>
            </li>
          @endif

          
          @if (Auth::user()->role === 'petugas')
            <li>
              <a href="{{ url('data-masyarakat') }}">
                <i class="bi bi-circle"></i><span>Data Masyarakat</span>
              </a>
            </li>
          @endif


          @if (Auth::user()->role === 'admin')
            <li>
              <a href="{{ url('data-semua-user') }}">
                <i class="bi bi-circle"></i><span>Data Admin</span>
              </a>
            </li>
          @endif


          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle">Beri Tanggapan</h5>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
                  <div id="modalContent">
    
    
                  </div>
                </div>
              </div>
            </div>
          </div>

          

          @if (Auth::user()->role === 'admin')
            <li>
              <button type="button" onclick="tambahPetugas()" style="margin-left: 40px;" class="btn btn-primary">
                Tambah Petugas
              </button>
            </li>
          @endif


        </ul>
      </li>



      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('profile-diri') }}"
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

    </ul>

  </aside>
  <!-- End Sidebar-->