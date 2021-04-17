<div class="table-responsive mb-6">
  <div>
    <table class="table align-items-center">
        <thead class="thead-light">
        <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">หัวข้อ</th>
            <th scope="col">หน่วยนับค่าเป้าหมาย</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $index => $val)
          <tr>
            <td scope="col">{{ $index + 1 }}</td>
            <td scope="col">{{ $val["subject"] }}</td>
            <td scope="col">{{ $val["unit"] }}</td>
            <td scope="col">
              @include("OKI.modal", ["add" => false, "id" => $index + 1, "subject" => $val["subject"], "detail" => $val["detail"], "unit" => $val["unit"] ])
              @include("OKI.confirm", ["name" => "ลบ", "id" => "remove-".$index, "color" => "danger"])
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>