<button type="button" class="btn btn-warning btn-icon btn-sm btn-simple" data-toggle="modal" data-target="#modal-user-edit-{{ $id }}">
  <i style="font-size: 1rem" class="ni ni-settings-gear-65 pt-1"></i>
</button>

<div class="modal fade" id="modal-user-edit-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">แก้สิทธิ์ผู้ใช้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('manageUser', ['id' => $id]) }}" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{ $id }}">
        <div class="modal-body">
          <div class="form-group">
            <label for="unit">สิทธิ์</label>
            <select name="role_id" class="form-control" data-toggle="select" data-placeholder="โปรดเลือกสิทธิ์">
            @foreach ($roleModel->all() as $role)
              <option value="{{ $role->id }}" {{ $currentRole == $role->id ? "selected" : "" }}>{{ $role->name }}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </form>
    </div>
  </div>
</div>