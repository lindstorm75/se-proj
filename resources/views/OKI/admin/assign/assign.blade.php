@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-danger pb-2 pt-3">
          <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบ OKR สำหรับหัวหน้างาน</h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
                      <li class="breadcrumb-item">หัวหน้างาน</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                  <a href="#" class="btn btn-sm btn-neutral">New</a>
                  <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card px-4 px-md-6 py-5">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="d-inline-block">
              <i class="ni ni-bold-right text-danger"></i>
              <i class="ni ni-bold-right text-danger"></i> <span>เลือกหัวหน้างาน</span>
            </h2>
            <div>
              @include("OKI.admin.assign.add")
            </div>
          </div>
            <div class="table-responsive">
                <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อสกุล</th>
                        <th scope="col">อีเมล</th>
                        <th scope="col">สาขาวิชา</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($heads as $index => $head)
                        <tr>
                          <td scope="col" class="sort">
                            <span>{{ $index + 1 }}</span>
                          </td>
                          <td scope="col" class="sort">{{ $head->full_name }}</td>
                          <td scope="col" class="sort">{{ $head->email }}</td>
                          <td scope="col" class="sort">{{ $departmentModel->where("id", $head->department_id)->first()->th_name }}</td>
                          <td scope="col" class="sort">{{ $head->position ?? "-" }}</td>
                          <td scope="col" class="sort">
                            <button type="button" rel="tooltip" class="btn btn-warning btn-icon btn-sm btn-simple">
                              <i style="font-size: 1rem" class="ni ni-settings-gear-65 pt-1"></i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple">
                              <i style="font-size: 1rem" class="ni ni-fat-remove pt-1"></i>
                            </button>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
@endsection