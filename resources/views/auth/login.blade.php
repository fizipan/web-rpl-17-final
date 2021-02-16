@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="page-content page-auth">
    <section class="store-auth" data-aos="fade-up">
        @if (session()->has('error'))
            <div class="flash-data-login" data-flashdata="{{ session()->get('error') }}"></div>
        @endif
        <div class="container">
            <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-6 text-center">
                <img
                src="/images/img-login.png"
                alt=""
                class="w-50 mb-lg-none d-none d-lg-block"
                />
            </div>
            <div class="col-lg-5">
                <h2 class="mb-4 d-none d-lg-block">
                Software Engineer Seventeen Silahkan Login!
                </h2>
                <h2 class="mb-4 d-block d-lg-none">
                Software Engineer 17
                <br />
                Silahkan Login!
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control w-75"
                        value="{{ old('email') }}"
                        />
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control w-75"
                        />
                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button
                        type="submit"
                        class="btn btn-success btn-block w-75 mt-4"
                    >
                        Sign In to My Account
                    </button>
                    <a href="{{ route('home') }}" class="btn btn-login btn-block w-75 mt-2"
                        >Back to Home</a
                    >
                </form>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
