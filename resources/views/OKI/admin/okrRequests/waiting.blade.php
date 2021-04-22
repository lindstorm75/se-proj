@extends('layouts.app')

@section('content')
  <div class="header bg-gradient-danger pb-2 pt-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบการจัดการตัวชี้วัด</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
                <li class="breadcrumb-item">ตัวชี้วัดที่รอการอนุมัติ</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card px-4 px-md-6 py-5">
  @if (Session::has("message") && Session::has("alertColor"))
    <div class="alert alert-{{ Session::get('alertColor') }}" role="alert">
      {{ Session::get("message") }}
    </div>
  @endif
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h2 class="d-inline-block">
        <i class="ni ni-bold-right text-danger"></i>
        <i class="ni ni-bold-right text-danger"></i> <span>สายวิชาการ</span>
      </h2>
      <div>
      </div>
    </div>
    @include("OKI.admin.okrRequests.waitingTable")
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      setTimeout(() => {
        const alert = document.querySelector(".alert")
        if (alert) alert.remove()
      }, 5000)
    })
  </script>

  @include('layouts.footers.auth')
@endsection