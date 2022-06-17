<div class="form-group">
    <label for="name">Nama Petugas</label>
    <input type="text" name="name" class="name form-control">
  </div>

  <div class="form-group">
    <label for="email">Email Petugas</label>
    <input type="text" name="email" class="email form-control" >
  </div>


  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" name="password" class="password form-control" value="petugas{{ mt_rand(15,1000) }}" disabled>
    <span>Disini Password Generate Otomatis</span>
  </div>

  <div class="form-group">
    <label for="role">Role </label>
    <input type="text" name="role" class="role form-control mb-3" value="petugas" disabled>
  </div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button  class="btn btn-primary" onClick="simpanDataPetugas()">Save</button>
</div>