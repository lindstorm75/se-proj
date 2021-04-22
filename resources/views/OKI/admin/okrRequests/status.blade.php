<button type="button" rel="tooltip" class="btn btn-info btn-icon btn-sm btn-simple" data-toggle="modal" data-target="#{{ $modalId }}">
  <i style="font-size: 1rem" class="ni ni-sound-wave pt-1"></i>
</button>

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ความก้าวหน้าตัวชี้วัด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="progress-wrapper" style="padding-top: 0px !important">
          <div class="progress-info">
            <div class="progress-label">
              <span style="font-size: .9rem">ความก้าวหน้า</span>
            </div>
            <div class="progress-percentage">
              <span>{{ "50%" }}</span>
            </div>
          </div>
          <div class="progress w-100 mt-2 mb-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>