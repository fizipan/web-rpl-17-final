@extends('layouts.dashboard')

@section('title', 'Account | RPL 17')

@section('content')
    <div id="page-content-wrapper">
        <nav
        class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
        data-aos="fade-down"
        >
        <div class="container-fluid">
            <button
            class="btn btn-secondary d-md-none mr-auto mr-2"
            id="menu-toggle"
            >
            &laquo; Menu
            </button>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collpase navbar-collapse" id="navbarResponsive">
            <!-- dekstop menu -->
            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                <a
                    href="#"
                    class="nav-link"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                >
                    <img
                    src="{{ Storage::url(Auth::user()->photo) }}"
                    alt="profile"
                    class="rounded-circle mr-2 profile-picture"
                    style="max-height: 45px; width: 50px;"
                    />
                    Hi, {{ Auth::user()->nickname }}
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('accounts.index') }}" class="dropdown-item"
                    >Settings</a
                    >
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                </li>
            </ul>

            <!-- mobile app -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                <a href="" class="nav-link">
                    Hi, {{ Auth::user()->nickname }}
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="flash-data-account" data-flashdata="{{ session()->get('success') }}"></div>
            @endif
            <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                <form action="{{ route('accounts.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name') ?? $user->name }}"
                            />
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="nickname">Nick Name</label>
                            <input
                                type="text"
                                name="nickname"
                                id="nickname"
                                class="form-control"
                                value="{{ old('nickname') ?? $user->nickname }}"
                            />
                            @error('nickname')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="email">Your Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                readonly
                                class="form-control"
                                value="{{ old('email') ?? $user->email }}"
                            />
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="class">Class</label>
                            <select
                                name="class"
                                id="class"
                                class="form-control"
                            >
                                <option value="{{ $user->class }}" selected>{{ $user->class }}</option>
                                <option value="Class 10">Class 10</option>
                                <option value="Class 11">Class 11</option>
                                <option value="Class 12">Class 12</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="photo">Photo Profile</label>
                            <input
                                type="file"
                                name="photo"
                                id="photo"
                                class="form-control"
                            />
                            @error('photo')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row mt-2">
                        {{-- <div class="col">
                            <button
                            type="submit"
                            name="save"
                            class="btn btn-danger px-4"
                            >
                            Delete Photo
                            </button>
                        </div> --}}
                        </div>
                        <div class="row mt-2">
                        <div class="col text-right">
                            <button
                            type="submit"
                            name="save"
                            class="btn btn-success px-4"
                            >
                            Save Now
                            </button>
                        </div>
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
@endsection

@push('addon-script')
    <script>
        $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
@endpush