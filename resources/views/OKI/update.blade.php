@extends('layouts.app')

@section('content')
    <div class="header bg-primary pb-6">
          <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบการยื่นผลงาน OKR</h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                      <li class="breadcrumb-item">ยื่นผลงาน</li>
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
            <h2><i class="ni ni-bold-right text-blue"></i><i class="ni ni-bold-right text-blue"></i> เลือกหัวข้อ OKR ที่ต้องการยื่น</h2>
            <div class="table-responsive">
                <div>
                <table class="table align-items-center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">หัวข้อ</th>
                        <th scope="col">หน่วยนับค่าเป้าหมาย</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                          <td scope="col" class="sort">
                            <span>{{ $i + 1 }}</span>
                          </td>
                          <td scope="col" class="sort">หัวข้อที่ {{ $i + 1 }}</td>
                          <td scope="col" class="sort">
                            <div class="form-group d-flex align-items-center">
                              <input class="form-control" style="width: 5rem" type="number" value="{{ rand(1, 5) }}" id="example-number-input" disabled>
                              <span class="ml-2">คน</span>
                            </div>
                          </td>
                          <td scope="col" class="sort">
                            <span class="badge badge-pill badge-lg badge-{{ ($i + 1) * 10 == 100 ? 'success' : 'warning' }}" style="font-size: .8rem">
                              {{ ($i + 1) * 10 == 100 ? "เสร็จสิ้น" : "กำลังดำเนินการ" }}
                            </span>
                          </td>
                          <td>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#item-{{ $i + 1 }}">
                              เลือก
                            </button>

                            <!-- Modal -->
                            <form action="{{ route('update') }}" method="post">
                              @csrf
                              <div class="modal fade" id="item-{{ $i + 1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">หัวข้อที่ {{ $i + 1 }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body pt-0">
                                      <div class="progress-wrapper" style="padding-top: 0px !important">
                                        <div class="progress-info">
                                          <div class="progress-label">
                                            <span style="font-size: .9rem">ความก้าวหน้า</span>
                                          </div>
                                          <div class="progress-percentage">
                                            <span>{{ ($i + 1) * 10 == 100 ? 100 : ($i + 1) * 10 % 100 }}%</span>
                                          </div>
                                        </div>
                                        <div class="progress w-100 mt-2 mb-4">
                                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($i + 1) * 10 == 100 ? 100 : ($i + 1) * 10 % 100 }}%;"></div>
                                        </div>
                                      </div>
                                      <h2><i class="ni ni-send text-blue"></i> ยื่นผลงาน</h2>
                                      <div class="form-group">
                                        <label for="deatil">ระเอียดเป้าหมาย</label>
                                        <input type="text" name="detail" class="form-control" id="deatil" placeholder="">
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="amount">ค่าเป้าหมาย</label>
                                        <input type="number" name="amount" class="form-control" id="amount" placeholder="">
                                      </div>

                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" lang="en">
                                        <label class="custom-file-label" name="file" for="file">เอกสารยืนยัน</label>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                      <button type="submit" class="btn btn-success">บันทึก</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
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