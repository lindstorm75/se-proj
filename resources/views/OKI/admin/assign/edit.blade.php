<button type="button" class="btn btn-warning btn-icon btn-sm btn-simple" data-toggle="modal" data-target="#modal-head-edit-{{ $index }}">
  <i style="font-size: 1rem" class="ni ni-settings-gear-65 pt-1"></i>
</button>

<div class="modal fade" id="modal-head-edit-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">แก้สิทธิ์ผู้ใช้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="{{ route('assign') }}" method="POST">
      @csrf
        <div class="modal-body">
          <label>ลูกน้องทั้งหมด</label>
          <ul class="list-group text-break pl-4" style="height: 10rem; min-height: 10rem">
            @foreach ($subs as $sub)
              @if ($sub->head_id == $headId)
                <li>{{ $sub->full_name }}</li>
              @endif
            @endforeach
          </ul>
          
          <input type="hidden" name="head_id" value="{{ $headId }}">
          <div class="form-group">
            <label for="sub_id">เลือกลูกน้อง</label>
            <select name="sub_id" id="sub_id" class="form-control" data-toggle="select" data-placeholder="โปรดเลือกผู้ใช้">
              <option value="{{ $sub->id }}">โปรดเลือกผู้ใช้</option>
            @foreach ($subs as $sub)
              @if (!$sub->headId && $sub->head_id != $headId)
              <option value="{{ $sub->id }}">{{ $sub->full_name }}</option>
              @endif
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