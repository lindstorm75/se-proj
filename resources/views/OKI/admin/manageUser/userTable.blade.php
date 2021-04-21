<div class="table-responsive mb-6">
  <div>
    <table class="table align-items-center" style="width: 100%">
        <thead class="thead-light">
        <tr>
          <th scope="col">ลำดับ</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">อีเมล</th>
          <th scope="col">สาขาวิชา</th>
          <th scope="col">ตำแหน่ง</th>
          <th scope="col">ระดับสิทธิ์</th>
          <th scope="col">หัวหน้า</th>
          <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $index => $val)
          <tr>
            <td scope="col">{{ $index + 1 }}</td>
            <td scope="col">{{ $val["full_name"] }}</td>
            <td scope="col">{{ $val["email"] }}</td>
            <td scope="col">{{ $departmentModel->where('id', $val["department_id"])->first()->th_name }}</td>
            <td scope="col">{{ $val["position"] ?? "-" }}</td>
            <td scope="col">{{ $roleModel->where("id", $val["role_id"])->first()->name }}</td>
            <td scope="col">{{ $userModel->where("id", $val["head_id"])->first()->name ?? "-" }}</td>
            <td scope="col">
              @include("OKI.admin.manageUser.edit", ["roleModel" => $roleModel, "currentRole" => $val["role_id"], "id" => $val["id"]])
              @include("OKI.confirm", ["id" => $val["id"], "name" => "ลบ", "modalId" => "remove-user-".$val["id"], "color" => "danger", "url" => route('manageUser.delete', ['id' => $val["id"]])])
              
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>