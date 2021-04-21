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
          <form>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="first_name">ชื่อ</label>
                  <input type="text" class="form-control" id="first_name" placeholder="สมหมาย" value="{{ explode(' ', auth()->user()->full_name)[0] }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="last_name">สกุล</label>
                  <input type="text" class="form-control" id="last_name" placeholder="ใจดี" value="{{ explode(' ', auth()->user()->full_name)[1] }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="rank">ตำแหน่ง</label>
                  <select class="form-control" id="rank">
                    <option>ศาสตราจารย์</option>
                    <option>รองศาสตราจารย์</option>ฃ
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="department">สังกัด</label>
                  <select class="form-control" id="department">
                  @foreach ($departments as $dep)
                    <option {{ auth()->user()->department_id == $dep->id ? "selected" : "" }}  value="{{ $dep->id }}">{{ $dep->th_name }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
            
            <br>

            <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> ส่วนที่ 2 เลือกหัวข้อ OKR</h2>
            <div class="table-responsive">
              <div>
                <table class="table align-items-center">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">ลำดับ</th>
                      <th scope="col">หัวข้อ</th>
                      <th scope="col">หน่วยนับค่าเป้าหมาย</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $index => $val)
                      <tr>
                        <td scope="col" class="sort">
                          <div class="custom-control custom-radio" style="margin-bottom: 2.2rem">
                            <input type="radio" id="choice-{{ $index + 1 }}" name="choice" class="custom-control-input">
                            <label class="custom-control-label" for="choice-{{ $index + 1 }}"></label>
                          </div>
                        </td>
                        <td scope="col" class="sort">{{ $index + 1 }}</td>
                        <td scope="col" class="sort">{{ $val["subject"] }}</td>
                        <td scope="col" class="sort">
                          <div class="form-group d-flex align-items-center">
                            <input class="form-control" style="width: 5rem" type="number" value="" id="example-number-input">
                            <span class="ml-2">{{ $val["unit"] }}</span>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
            <br>
            <br>

            <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> ส่วนที่ 3 เซ็นและอัปโหลดเอกสารบันทึกความเข้าใจ</h2>
            <p class="text-muted">ดาวน์โหลดเอกสารสารบันทึกความเข้าใจเพื่อเซ็นรับทราบ <a href="{{ route('getPdf') }}">ที่นี่</a></p>
            <label for="file">อัปโหลดสารสารบันทึกความเข้าใจ</label>
            <div class="row">
              <div class="col-md-10 col-lg-6 col-xl-4">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" lang="en">
                  <label class="custom-file-label" for="file">เลือกไฟล์</label>
                </div>
              </div>
            </div>
            
            <button type="submit" class="btn btn-success float-right mt-4">ยืนยัน</button>
          </form>
        </div>
        @include('layouts.footers.auth')
@endsection