<div class="table-responsive mb-6">
  <div>
    <table class="table align-items-center">
        <thead class="thead-light">
        <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">ชื่อสกุล</th>
            <th scope="col">หัวข้อ</th>
            <th scope="col">จำนวนเป้าหมาย</th>
            <th scope="col">ไฟล์</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $index => $val)
          <tr>
            <td scope="col">{{ $index + 1 }}</td>
            <td scope="col">{{ $userModel->where("id", $val["creator_id"])->first()->full_name }}</td>
            <td scope="col">{{ $okrModel->where("id", $val["okr_id"])->first()->subject }}</td>
            <td scope="col">{{ $val["amount"] }}</td>
            <td scope="col">
              <a href="{{ 'getPdf'.$val->pdf_path }}">
                <button type="button" class="btn btn-primary btn-icon btn-sm btn-simple">
                  <i style="font-size: 1rem" class="ni ni-cloud-download-95 text-white mt-1"></i>
                </button>
              </a>
            </td>
            <td scope="col">
              @include("OKI.admin.okrRequests.declineOkr", [
                "id" => $val["id"],
                "modalId" => "decline-".($index + 1),
              ])
              @if (!$val["is_approved"])
                @include("OKI.admin.okrRequests.confirmOkr", [
                  "okr_id" => $val["okr_id"],
                  "modalId" => "confirm-".($index + 1),
                ])
              @else
                @include("OKI.admin.okrRequests.status", [
                  "amount" => $val["amount"],
                  "okr_id" => $val["okr_id"],
                  "modalId" => "status-".($index + 1)
                ])
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>