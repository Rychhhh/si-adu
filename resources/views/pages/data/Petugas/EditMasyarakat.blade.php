<div class="form-group">
    <label for="name">Name </label>
    <input type="text" name="name" class="name form-control" value={{ $value->name }}>
  </div>

  <div class="form-group">
    <label for="name">Email </label>
    <input type="text" name="email" class="email form-control" value={{ $value->email }}>
  </div>

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    <button  class="btn btn-primary" onClick="updateDataMasyarakat({{ $value->id }})">Save</button>
</div>