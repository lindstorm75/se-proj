@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('ยินดีต้อนรับ') . ' '. auth()->user()->full_name,
        'class' => 'col-lg-7'
    ])   
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('แก้ไขบัญชีผู้ใช้') }}</h3>
                            <img
                                class="rounded position-absolute right--6"
                                src="https://pbs.twimg.com/profile_images/1129139436070035463/qFK0rqx5_400x400.png"
                                alt="user's image"
                                width="200">
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has("message") && Session::has("alertColor"))
                            <div class="alert alert-{{ Session::get('alertColor') }}" role="alert">
                                {{ Session::get("message") }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h4 class="text-muted mb-4">{{ __('ข้อมูลผู้ใช้') }}</h4>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                            
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('ชื่อ') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('ระบุชื่อ') }}" value="{{ old('name', auth()->user()->full_name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
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
                                    
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('position') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-position">{{ __('ตำแหน่ง') }}</label>
                                    <input type="text" name="position" id="input-position" class="form-control form-control-alternative{{ $errors->has('position') ? ' is-invalid' : '' }}" placeholder="{{ __('ระบุตำแหน่ง') }}" value="{{ old('position', auth()->user()->position) }}">

                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                 
                                

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('บันทึก') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <!-- <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h4 class="text-muted mb-4">{{ __('รหัสผ่าน') }}</h4>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('รหัสผ่านปัจจุบัน') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection