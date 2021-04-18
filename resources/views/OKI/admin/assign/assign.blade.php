@extends('layouts.app')

@section('content')
  <div class="header bg-gradient-danger pb-2 pt-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบการจัดการหัวหน้างาน</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
                <li class="breadcrumb-item">กำหนดหัวหน้างาน</li>
              </ol>
            </nav>
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
    <div class="row">
    @for ($i = 0; $i < 5; $i++)
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="card d-flex pt-4 my-2">
          <img style="width: 10rem;" class="mx-auto card-img-top rounded-circle" src="https://pbs.twimg.com/profile_images/1299325360488628232/uj7Xap1V_400x400.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title m-0">ผศ.ดร. สมชาย สายทุกวัน</h3>
            <p class="card-text">วิศวกรรมคอมพิวเตอร์</p>
            <div class="w-100">
              <button href="#" class="btn btn-outline-danger">ลบ</button>
              <button href="#" class="btn btn-outline-warning">จัดการ</button>
            </div>
          </div>
        </div>
      </div>
    @endfor
    </div>
  </div>

  @include('layouts.footers.auth')
@endsection