<button type="button" class="btn btn-outline-{{ $add ? 'success' : 'warning' }}" data-toggle="modal" data-target="#modal-{{ $id }}">
  {{ $add ? "เพิ่มตัวชี้วัด" : "แก้ไข" }}
</button>

<div class="modal fade" id="modal-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $add ? "เพิ่มตัวชี้วัด" : "แก้ไขตัวชี้วัด" }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('settings.add') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="subject">หัวข้อเรื่อง</label>
            <textarea style="resize: none" class="form-control" rows="5" placeholder="โปรดเพิ่มหัวข้อ">{{ $subject ?? "" }}</textarea>
          </div>
          <div class="form-group">
            <label for="detail">รายละเอียด</label>
            <textarea style="resize: none" class="form-control" rows="5" placeholder="โปรดเพิ่มรายละเอียด">{{ $detail ?? "" }}</textarea>
          </div>
          <div class="form-group">
            <label for="unit">หน่วยนับค่าเป้าหมาย</label>
            <input type="text" name="unit" class="form-control" id="unit" placeholder="เช่น คน, บาท, โครงการ" value="{{ $unit ?? '' }}">
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