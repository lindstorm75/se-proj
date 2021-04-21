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
          <form action="{{ route('generatePdf') }}" method="POST">
          @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="full_name">ชื่อสกุล</label>
                  <input name="full_name" type="text" class="form-control" id="first_name" placeholder="สมหมาย" value="{{ auth()->user()->full_name }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="rank">ตำแหน่ง</label>
                  <select class="form-control" id="rank" name="position">
                    <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                    <option>รองศาสตราจารย์</option>ฃ
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="department_id">สังกัด</label>
                  <select class="form-control" name="department_id" id="department_id">
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
                            <input type="radio" id="okr-{{ $val['id'] }}" name="okr_id" value="{{ $val['id'] }}" class="custom-control-input">
                            <label class="custom-control-label" for="okr-{{ $val['id'] }}"></label>
                          </div>
                        </td>
                        <td scope="col" class="sort">{{ $index + 1 }}</td>
                        <td scope="col" class="sort">{{ $val["subject"] }}</td>
                        <td scope="col" class="sort">
                          <div class="form-group d-flex align-items-center">
                            <label for="amount"></label>
                            <input name="amount-{{ $val['id'] }}" class="form-control" style="width: 5rem" type="text">
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
            <button type="submit" class="btn btn-success float-right mt-4">ดำเนินการต่อ</button>
          </form>
        </div>
        @include('layouts.footers.auth')
@endsection