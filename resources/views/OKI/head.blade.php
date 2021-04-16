@extends('layouts.app')

@section('content')
    <div class="header bg-danger pb-2 pt-6">
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
            <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> เลือกบุคลากร </h2>
            <div class="table-responsive">
                <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อสกุล</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                          <td scope="col" class="sort">
                            <span>{{ $i + 1 }}</span>
                          </td>
                          <td scope="col" class="sort">นายสมหมาย ใจดี</td>
                          <td scope="col" class="sort">{{ "พนักงานทำความสะอาด" }}</td>
                          <td scope="col" class="sort">
                            <button type="button" class="btn btn-outline-success">เลือก OKR</button>
                            <button type="button" class="btn btn-outline-info">ยื่นผลงาน</button>
                            <button type="button" class="btn btn-outline-warning">ดูสถานะ</button>
                          </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush