<div class="form-group">
    <label for="name">Name </label>
    <input type="text" name="name" class="name form-control" value={{ $edit->name }}>
  </div>

  <div class="form-group">
    <label for="name">Email </label>
    <input type="text" name="email" class="email form-control" value={{ $edit->email }}>
  </div>

  <div class="form-group">
    <label for="name">Role </label>
    <select name="role" class="role form-control">
        @php
            $roles = ['pengaju', 'petugas', 'admin']
        @endphp

        <option>{{ $edit->role }}</option>
        @foreach ($roles as $item)
            <option value="">{{ $item }}</option>
        @endforeach
    </select>
  </div>

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      <button  class="btn btn-primary" onClick="updateData({{ $edit->id }})">Save</button>
</div>