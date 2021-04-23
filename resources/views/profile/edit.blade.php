@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('ยินดีต้อนรับ') . ' '.auth()->user()->full_name,
        'class' => 'col-lg-7'
    ])   
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('แก้ไขบัญชีผู้ใช้') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has("message") && Session::has("alertColor"))
                            <div class="alert alert-{{ Session::get('alertColor') }}" role="alert">
                                {{ Session::get("message") }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('updateProfile') }}" autocomplete="off">
                            @csrf
                            <h4 class="text-muted mb-4">{{ __('ข้อมูลผู้ใช้') }}</h4>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">{{ __('ชื่อ') }}</label>
                                    <input type="text" name="full_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('ระบุชื่อ') }}" value="{{ old('name', auth()->user()->full_name) }}" required autofocus>
                                </div>
                                <div class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department_id">{{ __('สาขาวิชา') }}</label>
                                    <select
                                    type="text"
                                    name="department_id"
                                    id="input-department_id"
                                    class="form-control form-control-alternative{{ $errors->has('department_id') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('department_id') }}"
                                    value="{{ old('department_id', auth()->user()->department_id) }}"
                                    required>
                                        @foreach ($departments as $dep)
                                        <option {{ auth()->user()->department_id == $dep['id'] ? "selected" : "" }} value="{{ $dep['id'] }}">{{ $dep['th_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-position">{{ __('ตำแหน่ง') }}</label>
                                    <input type="text" name="position" id="input-position" class="form-control form-control-alternative{{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="{{ __('ระบุตำแหน่ง') }}" value="{{ old('position', auth()->user()->position) }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('บันทึก') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-xl-4 order-xl-1">
                <div class="card">
                    <img
                        class="rounded mx-auto my-4"
                        src="{{ auth()->user()->image ?? 'https://th.jobsdb.com/th-th/cms/employer/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png' }}"
                        alt="user's image"
                        width="125">
                    <div class="card-body">
                        @if ($roleName == "subordinate")
                            <span style="font-size: 1rem" class="badge badge-pill badge-warning float-right">ลูกน้อง</span>
                        @elseif ($roleName == "user")
                            <span style="font-size: 1rem" class="badge badge-pill badge-success float-right">ผู้ใช้ทั่วไป</span>
                        @elseif ($roleName == "head")
                            <span style="font-size: 1rem" class="badge badge-pill badge-info float-right">หัวหน้างาน</span>
                        @elseif ($roleName == "dean")
                            <span style="font-size: 1rem" class="badge badge-pill badge-primary float-right">คณะบดี</span>
                        @elseif ($roleName == "admin")
                            <span style="font-size: 1rem" class="badge badge-pill badge-danger float-right">ผู้ดูแลระบบ</span>
                        @endif
                        <h2 class="card-title">{{ auth()->user()->full_name }}</h2>
                        <ul class="list-group">
                            <li class="list-group-item pb-0">
                                <p>
                                <i class="fas fa-envelope"></i>
                                อีเมล
                                <ul>
                                    <li>
                                    <label>{{ auth()->user()->email }}</label>
                                    </li>
                                </ul>
                                </p>
                            </li>
                            <li class="list-group-item pb-0">
                                <p>
                                <i class="fas fa-building"></i>
                                สาขาวิชา
                                <ul>
                                    <li>
                                    @foreach ($departments as $dep)
                                        @if ($dep->id == auth()->user()->department_id)
                                            <label>{{ $dep->th_name }}</label>
                                            @break
                                        @endif
                                    @endforeach
                                    </li>
                                </ul>
                                </p>
                            </li>
                            <li class="list-group-item pb-0">
                                <p>
                                <i class="fas fa-user-tag"></i>
                                ตำแหน่ง
                                <ul>
                                    <li>
                                        <label>{{ auth()->user()->position ?? "-  " }}</label>
                                    </li>
                                </ul>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection