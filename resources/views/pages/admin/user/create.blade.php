@extends('layouts.dashboard-admin')

@section('title')
    Create User
@endsection


@section('content')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collpase navbar-collapse" id="navbarResponsive">

                <!-- dekstop menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile" class="rounded-circle mr-2 profile-picture" style="max-height: 45px; width: 50px;">
                            Hi, {{ Auth::user()->nickname }}
                        </a>
                        <div class="dropdown-menu">
                        <a href="{{ route('account.index') }}" class="dropdown-item">Settings</a>
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
                        <a class="nav-link d-inline-block" href="{{ route('logout') }}"
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
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="flash-data-user" data-flashdata="{{ session()->get('success') }}"></div>
                @endif
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Users</h2>
                    <p class="dashboard-subtitle">Create User</p>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nickname</label>
                                            <input type="text" name="nickname" class="form-control">
                                            @error('nickname')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email User</label>
                                            <input type="email" name="email" class="form-control">
                                            @error('email')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select name="class" class="form-control">
                                                <option disabled selected>-- Select Class --</option>
                                                <option value="Class 10">Class 10</option>
                                                <option value="Class 11">Class 12</option>
                                                <option value="Class 12">Class 11</option>
                                            </select>
                                            @error('class')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Roles</label>
                                            <select name="roles_id" class="form-control">
                                                <option disabled selected>-- Select Roles --</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('roles_id')
                                                <span class="text-danger mt-1">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
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
