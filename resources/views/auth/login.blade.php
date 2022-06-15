@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ asset('img/login-img.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">{{ __('Sign In') }}</h5>
                                    <p class="card-text mb-5">{{ __('See your growth and get consulting support!') }}</p>
                                    <form class="form-body" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="email"
                                                    class="form-label">{{ __('Email Address') }}</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <input id="email" type="email"
                                                        class="form-control radius-30 ps-5 @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        placeholder="{{ __('Email Address') }}" autocomplete="email"
                                                        autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password"
                                                    class="form-label">{{ __('Enter Password') }}</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input id="password" type="password"
                                                        class="form-control radius-30 ps-5 @error('password') is-invalid @enderror"
                                                        name="password" required placeholder="{{ __('Enter Password') }}"
                                                        autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            {{-- <div class="col-6 text-end">
                                                @if (Route::has('password.request'))
                                                    <a
                                                        href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}</a>
                                                @endif
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                        class="btn btn-primary radius-30">{{ __('Sign In') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
