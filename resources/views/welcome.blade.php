@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-danger py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <img style="width: 150px; height: 150px" src="https://upload.wikimedia.org/wikipedia/th/thumb/a/a6/Engineering_KKU_Thai_Emblem.png/1024px-Engineering_KKU_Thai_Emblem.png" class="mb-6" />
                        <h1 class="text-white">{{ __('Welcome to Engineering OKR') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
