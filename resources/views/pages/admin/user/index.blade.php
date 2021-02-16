@extends('layouts.dashboard-admin')

@section('title')
    User
@endsection

@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
@endpush

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
                    <p class="dashboard-subtitle">List Of Users</p>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">+ Create New User</a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Class</th>
                                                <th>Roles</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}'
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'class', name: 'class'},
                {data: 'role.name', name: 'role.name'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false,
                    searcable: false,
                    width: '15%',
                },
            ]
        });
    </script>
    <script>
        $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
@endpush