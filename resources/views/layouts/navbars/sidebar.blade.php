<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="d-flex flex-column align-items-center mb--4" href="{{ route('home') }}">
            <img
                src="https://upload.wikimedia.org/wikipedia/th/thumb/a/a6/Engineering_KKU_Thai_Emblem.png/200px-Engineering_KKU_Thai_Emblem.png"
                alt="EN KKU's logo"
                width="100"
                class="d-none d-md-block"
            >
            <h1 style="color: crimson" class="mt-2">Engineering OKI</h1>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ auth()->user()->image ?? 'https://th.jobsdb.com/th-th/cms/employer/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png' }}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-chart-bar-32 text-primary"></i> {{ __('หน้าหลัก') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('schedule') }}">
                        <i class="ni ni-calendar-grid-58 text-orange"></i> {{ __('กำหนดการ') }}
                    </a>
                </li>

                @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('selection') }}">
                        <i class="ni ni-check-bold text-success"></i> {{ __('เลือก OKI') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('update') }}">
                        <i class="ni ni-send text-info"></i> {{ __('ยื่นผลงาน') }}
                    </a>
                </li>
                @endif

                @if (auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('head') }}">
                        <i class="ni ni-single-02 text-danger"></i> {{ __('หัวหน้างาน') }}
                    </a>
                </li>
                @endif

                @if (auth()->user()->role_id == 5)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('waiting') }}">
                        <i class="ni ni-bullet-list-67 text-success"></i> {{ __('คำร้องขอตัวชี้วัดทั้งหมด') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('okr') }}">
                        <i class="ni ni-settings text-info"></i> {{ __('จัดการตัวชี้วัด') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('assign') }}">
                        <i class="ni ni-settings-gear-65 text-primary"></i> {{ __('กำหนดหัวหน้างาน') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manageUser') }}">
                        <i class="ni ni-circle-08 text-success"></i> {{ __('จัดการสิทธิ์ผู้ใช้') }}
                    </a>
                </li>
                @endif



                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="ni ni-single-02 text-warning"></i> {{ __('โปรไฟล์') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run text-danger"></i> {{ __('ออกจากระบบ') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>