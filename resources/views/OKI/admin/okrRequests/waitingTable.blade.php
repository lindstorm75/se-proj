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
            <td scope="col">{{ $val["name"] }}</td>
            <td scope="col">{{ $val["subject"] }}</td>
            <td scope="col">{{ $val["amount"] }}</td>
            <td scope="col">
              <button type="button" class="btn btn-info btn-icon btn-sm btn-simple">
                <i style="font-size: 1rem" class="ni ni-cloud-download-95 text-white mt-1"></i>
              </button>
              file goes here
            </td>
            <td scope="col">
              @include("OKI.admin.okrRequests.declineOkr", [
                "modalId" => "decline-".($index + 1),
              ])
              @include("OKI.admin.okrRequests.confirmOkr", [
                "modalId" => "confirm-".($index + 1),
              ])
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>