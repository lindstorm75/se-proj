@extends('layouts.app')

@section('content')
    <div class="header bg-danger pb-2 pt-6">
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
                <div class="col-lg-6 col-5 text-right">
                  <a href="#" class="btn btn-sm btn-neutral">New</a>
                  <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
                  <input type="text" class="form-control" id="first_name" placeholder="สมหมาย">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="last_name">สกุล</label>
                  <input type="text" class="form-control" id="last_name" placeholder="ใจดี">
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
                    <option>วิศวกรรมไฟฟ้า</option>
                    <option>วิศวกรรมคอมพิวเตอร์</option>
                    <option>วิศวกรรมโยธา</option>
                    <option>วิศวกรรมเคมี</option>
                    <option>วิศวกรรมดิจิตอล</option>
                    <option>วิศวกรรมอิเล็กทรอนิกส์</option>
                    <option>วิศวกรรมเครื่องกล</option>
                    <option>วิศวกรรมเกษตร</option>
                    <option>วิศวกรรมอุตสาหการ</option>
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
                      <th scope="col">ลำดับ</th>
                      <th scope="col">หัวข้อ</th>
                      <th scope="col">หน่วยนับค่าเป้าหมาย</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < 12; $i++)
                      <tr>
                        <td scope="col" class="sort">
                          <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="choice-{{ $i + 1 }}" name="choice" class="custom-control-input">
                            <label class="custom-control-label" for="choice-{{ $i + 1 }}">{{ $i + 1 }}</label>
                          </div>
                        </td>
                        <td scope="col" class="sort">หัวข้อที่ {{ $i + 1 }}</td>
                        <td scope="col" class="sort">
                          <div class="form-group d-flex align-items-center">
                            <input class="form-control" style="width: 5rem" type="number" value="" id="example-number-input">
                            <span class="ml-2">คน</span>
                          </div>
                        </td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
            </div>
            <button type="submit" class="btn btn-success float-right">ยืนยัน</button>
          </form>
        </div>
        @include('layouts.footers.auth')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush