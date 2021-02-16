@extends('layouts.dashboard')

@section('title', 'Dashboard | RPL 17')

@section('content')
    <!-- page content -->
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
            @if ($total || $project || $tutorial)
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Dashboard</h2>
                    <p class="dashboard-subtitle">Look what you have made today!</p>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                <div class="dashboard-card-title">Tutorials</div>
                                <div class="dashboard-card-subtitle">{{ number_format($tutorial) }}  Videos</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                <div class="dashboard-card-title">Projects</div>
                                <div class="dashboard-card-subtitle">{{ number_format($project) }} Projects</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-body">
                                <div class="dashboard-card-title">Total</div>
                                <div class="dashboard-card-subtitle">{{ number_format($total) }} Activity</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 mt-2">
                            <h5 class="mb-3">Recent Activities</h5>
                            @foreach ($tutorials as $item)
                                <a
                                    {{-- href="{{ route('tutor.edit', $item->slug) }}" --}}
                                    class="card card-list d-block"
                                >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                            <img
                                                src="{{ Storage::url($item->photo) }}"
                                                class="w-100 d-none d-lg-block"
                                                alt=""
                                            />
                                            <img
                                                src="{{ Storage::url($item->photo) }}"
                                                class="w-25 d-block d-lg-none"
                                                alt=""
                                            />
                                            </div>
                                            <div class="col-md-4">
                                                {{ Str::limit($item->name, 20) }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ Str::limit($item->user->name, 20) }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $item->created_at->format('d F, Y') }}
                                            </div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/images/icon-row.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            
                            @foreach ($projects as $item)
                                <a
                                    {{-- href="{{ route('tutorial.edit', $item->slug) }}" --}}
                                    class="card card-list d-block"
                                >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                            <img
                                                src="{{ Storage::url($item->photo) }}"
                                                class="w-100 d-none d-lg-block"
                                                alt=""
                                            />
                                            <img
                                                src="{{ Storage::url($item->photo) }}"
                                                class="w-25 d-block d-lg-none"
                                                alt=""
                                            />
                                            </div>
                                            <div class="col-md-4">
                                                {{ $item->name }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $item->user->name }}
                                            </div>
                                            <div class="col-md-3">
                                                {{ $item->created_at->format('d F, Y') }}
                                            </div>
                                            <div class="col-md-1 d-none d-md-block">
                                                <img src="/images/icon-row.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
            <div class="row mt-5 pt-5 text-center align-items-center justify-content-center" style="height: 80vh">
                <div class="col-lg-6">
                    <img src="/images/img-no-data.svg" class="w-50" alt="">
                    <div class="dashboard-product-title text-center mt-3">
                        <h4>No Data Available</h4>
                    </div>
                    <div class="dashboard-product-subtitle text-center">
                        Make magic for the various knowledge
                    <br>
                        that has been obtained
                    </div>
                </div>
            </div>
            @endif
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