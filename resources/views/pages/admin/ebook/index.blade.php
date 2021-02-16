@extends('layouts.dashboard-admin')

@section('title', 'E-books | RPL 17')

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
                    <div class="flash-data-ebook" data-flashdata="{{ session()->get('success') }}"></div>
                @endif
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">E-Books</h2>
                    <p class="dashboard-subtitle">Give additional knowledge with the e-book</p>
                    <a href="{{ route('ebook.create') }}" class="btn btn-success">
                    Add New E-book
                    </a>
                </div>
                @if ($ebooks->count())
                    <div class="dashboard-content">
                        <div class="row mt-4">
                            @foreach ($ebooks as $ebook)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ route('ebook.edit', $ebook->slug) }}" class="card card-list-product mb-5">
                                    <div class="card-body">
                                        <img src="{{ Storage::url($ebook->photo) }}" alt="" class="w-100" style="height: 160px;">
                                        <div class="dashboard-product-title overflow">
                                            {{ Str::limit($ebook->name, 16) }}
                                        </div>
                                        <div class="dashboard-product-subtitle">
                                            {{ Str::limit($ebook->user->name, 16) }}
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 d-flex justify-content-center">
                                {{ $ebooks->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                @else
                <div class="dashboard-content">
                    <div class="row mt-5 pt-3 text-center align-items-center justify-content-center">
                        <div class="col-lg-6">
                            <img src="/images/img-no-data.svg" class="w-50" alt="">
                            <div class="dashboard-product-title text-center mt-3">
                                <h4>Tutorial Not Found</h4>
                            </div>
                            <div class="dashboard-product-subtitle text-center">
                                Make tutorials for the various knowledge
                            <br>
                                that has been obtained
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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