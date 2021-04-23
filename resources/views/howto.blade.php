@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  @include('layouts.headers.howto')
  <style>
    .active {
      background-color: #EE153E !important;
    }
    .nav-link.howto:not(.active) {
      color: red !important;
    }
    .nav-link {
      font-size: 1rem !important;
    }
    a#back {
      text-decoration: none;
      color: #EF4444;
      font-size: 1rem;
    }
    a#back:hover {
      color: #F87171;
    }
  </style>
  <div class="container mt-4 pb-2">
    <!-- <a href="{{ route('home') }}" id="back">กลับสู่หน้าหลัก</a> -->
    <div class="row align-items-center">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-3">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
          <li class="breadcrumb-item">วิธีการใช้งาน</li>
        </ol>
      </nav>
    </div>
    <ul class="nav nav-pills nav-fill flex-column flex-sm-row mb-4" id="tabs-text" role="tablist">
      <li class="nav-item">
        <a class="nav-link howto mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" href="#sigin" aria-controls="tabs-text-1" aria-selected="true">การลงชื่อเข้าใช้</a>
      </li>
      <li class="nav-item">
        <a class="nav-link howto mb-sm-3 mb-md-0" id="tabs-text-2-tab" href="#accounts" aria-controls="tabs-text-2" aria-selected="false">บัญชีผู้ใช้งานที่มีในระบบ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link howto mb-sm-3 mb-md-0" id="tabs-text-3-tab" href="#permissions" aria-controls="tabs-text-3" aria-selected="false">สิทธ์และสิ่งที่ทำได้</a>
      </li>
    </ul>
    <div class="col-lg-12 mb-4">
        @include("OKI.howto.signin")
    </div>
    <div class="col-lg-12 mb-4">
      @include("OKI.howto.accounts")
    </div>
    <div class="col-lg-12 mb-4">
      @include("OKI.howto.permissions")
    </div>
  </div>

  <script>
    document.add
    const tabs = document.querySelectorAll("a.nav-link")
    tabs.forEach(tab => tab.addEventListener("click", e => {
      tabs.forEach(tab => tab.classList.remove("active"))
      e.target.classList.add("active")
    }))
  </script>
@endsection

