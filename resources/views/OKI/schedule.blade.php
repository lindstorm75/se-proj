@extends('layouts.app')

@section('content')
  <div class="header bg-gradient-danger pb-2 pt-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่หน้ากำหนดการ</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
                <li class="breadcrumb-item">กำหนดการ</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card px-4 px-md-6 py-5">
    <div class="card" style="width: 24rem;">
      <div class="card-title px-4 pt-4 mb-0">
        <h2><i class="ni ni-calendar-grid-58 text-success"></i> กำหนดการลงทะเบียน OKI</h2>
        <hr>
      </div>
      <div class="card-body pt-0">
        <p>
          <i class="ni ni-notification-70 text-info"></i>
          <span>ประกาศหัวข้อตัวชี้วัด</span> <span>7 ม.ค. 64</span>
        </p>
        <p>
          <i class="ni ni-active-40 text-primary"></i>
          <span>เลือกหัวข้อตัวชี้วัด</span> <span>8 - 15 ม.ค. 64</span>
        </p>
        <p>
          <i class="ni ni-settings-gear-65 text-warning"></i>
          <span>เปลี่ยนหัวข้อตัวชี้วัด</span> <span>25 ม.ค. 64 - 10 ธ.ค. 64</span>
        </p>
        <p>
          <i class="ni ni-send text-success"></i>
          <span>ยื่นผลงาน</span> <span>20 ม.ค. 64 - 24 ธ.ค. 64</span>
        </p>
        <p>
          <i class="ni ni-trophy text-info"></i>
          <span>ประกาศผลการประเมิน</span> <span>26 ธ.ค. 64</span>
        </p>
      </div>
    </div>
  </div>

    @include('layouts.footers.auth')
@endsection