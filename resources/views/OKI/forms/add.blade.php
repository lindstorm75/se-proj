<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-add">
  เพิ่มตัวชี้วัด
</button>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">เพิ่มตัวชี้วัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('settings.add') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="subject">โปรดเลือกสาย</label>
            <select name="category" class="form-control" data-toggle="select" data-placeholder="โปรดเลือกสาย">
              <option value="technical">สายวิชาการ</option>
              <option value="support">สายสนับสนุน</option>
            </select>
          </div>
          <div class="form-group">
            <label for="subject">หัวข้อเรื่อง</label>
            <textarea name="subject" style="resize: none" class="form-control" rows="5" placeholder="โปรดเพิ่มหัวข้อ"></textarea>
          </div>
          <div class="form-group">
            <label for="detail">รายละเอียด</label>
            <textarea name="detail" style="resize: none" class="form-control" rows="5" placeholder="โปรดเพิ่มรายละเอียด"></textarea>
          </div>
          <div class="form-group">
            <label for="unit">หน่วยนับค่าเป้าหมาย</label>
            <input type="text" name="unit" class="form-control" id="unit" placeholder="เช่น คน, บาท, โครงการ" value="">
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