<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-add">
  เพิ่มหัวหน้างาน
</button>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">เพิ่มหัวหน้างาน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('assign') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="name">ชื่อสกุล</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="สมหมาย ใจดี" value="">
          </div>
          <div class="form-group">
            <label for="position">ตำแหน่ง</label>
            <input type="text" name="position" class="form-control" id="position" placeholder="เช่น ผศ.ดร., ดร." value="">
          </div>
          <div class="form-group">
            <label for="department">สังกัด</label>
            <select name="department" class="form-control" data-toggle="select" data-placeholder="โปรดเลือกสังกัด">
              <option value="electrical">วิศวกรรมไฟฟ้า</option>
              <option value="computer">วิศวกรรมคอมพิวเตอร์</option>
              <option value="civil">วิศวกรรมโยธา</option>
              <option value="chemical">วิศวกรรมเคมี</option>
              <option value="digital">วิศวกรรมดิจิตอล</option>
              <option value="electronic">วิศวกรรมอิเล็กทรอนิกส์</option>
              <option value="mechanical">วิศวกรรมเครื่องกล</option>
              <option value="agricultaral ">วิศวกรรมเกษตร</option>
              <option value="industrial">วิศวกรรมอุตสาหการ</option>
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