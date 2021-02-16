@extends('layouts.dashboard')

@section('title', 'Edit Project | RPL 17')

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
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit Project</h2>
            <p class="dashboard-subtitle">Edit your own Project</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('projects.update', $projects->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="name">Project Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            value="{{ old('name') ?? $projects->name }}"
                                        />
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="url">Project URL</label>
                                        <input
                                            type="text"
                                            name="url"
                                            id="url"
                                            class="form-control"
                                            value="{{ old('url') ?? $projects->url }}"
                                        />
                                        @error('url')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input
                                            type="file"
                                            name="photo"
                                            id="photo"
                                            class="form-control"
                                        />
                                        @error('photo')
                                            <span class="text-danger text-small">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success px-5 btn-block"
                                            >
                                            Update Project
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger px-5 btn-block" data-toggle="modal" data-target="#exampleModal">
                                        Delete Project
                                    </button>
                                </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure to delete <span class="text-danger">"{{ $projects->name }}"</span> ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ route('projects.destroy', $projects->slug) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger px-5 btn-block">
                    Delete Project
                </button>
            </form>
        </div>
        </div>
    </div>
</div>