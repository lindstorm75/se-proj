@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-danger pb-2 pt-6">
          <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบการเลือก OKR</h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
                      <li class="breadcrumb-item">เลือก OKR</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card px-4 px-md-6 py-5">
          <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> ส่วนที่ 1 ข้อมูลรายบุคคล</h2>
          <form action="{{ route('selection') }}" method="POST">
          @csrf
            <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> ส่วนที่ 3 เซ็นและอัปโหลดเอกสารบันทึกความเข้าใจ</h2>
              <p class="text-muted"><a href="{{ route('generatePdf') }}">สร้าง</a>เอกสารบันทึกความเข้าใจ</p>
              <p class="text-muted">ดาวน์โหลดเอกสารสารบันทึกความเข้าใจเพื่อเซ็นรับทราบ <a href="{{ route('getPdf') }}">ที่นี่</a></p>
              <div class="row">
                <div class="col-md-10 col-lg-6 col-xl-4">
                <div class="form-group">
                  <label for="file">อัปโหลดสารสารบันทึกความเข้าใจ</label>
                  <input name="file" type="file" class="form-control-file" id="file">
                </div>
              </div>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success float-right mt-4">ยืนยัน</button>
          </form>
        </div>
        @include('layouts.footers.auth')
@endsection