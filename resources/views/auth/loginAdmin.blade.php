@extends('layouts.master2')
@section('title')
  تسجيل دخول _ الحلال توب فود
@stop

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- The image half -->
            <!-- The content half -->
            <div class="col bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-4 mx-auto ">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> 
                                        {{-- <a href="{{ url('/' . ($page = 'Home')) }}"><img
                                                src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40 " alt="logo"></a> --}}
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 ">الحلال توب فود</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3 class="font-weight-semibold mb-4 text-center"> تسجيل الدخول</h3>
                                            <form method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label> الهاتف</label>
                                                    <input id="phone" type="phone"
                                                        class="form-control maxlength="11" minlength="11" @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ old('phone') }}" required
                                                         autofocus>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>كلمة المرور</label>

                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('تذكرني') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            {{-- <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
@section('js')
@endsection
















{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login.admin') }}">
            @csrf


            <!-- phone Address -->
            <div>
                <x-label for="email" :value="__('phone')" />

                <x-input id="phone" class="block mt-1 w-full" maxlength="12" minlength="12" type="number" name="phone" :value="old('phone')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
