<style>
  .page-item.active a {
    background: #F5365C !important;
    border: none;
  }
</style>
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
        <nav class="float-right">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
    </table>
  </div>
</div>