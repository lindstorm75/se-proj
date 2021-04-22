<button type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple" data-toggle="modal" data-target="#{{ $modalId }}">
  <i style="font-size: 1rem" class="ni ni-check-bold pt-1"></i>
</button>

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">อนุมัติตัวชี้วัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <a href="{{ route('confirmOkr', ['id' => 1]) }}" class="btn btn-success ">ยืนยัน</a>
      </div>
    </div>
  </div>
</div>