@extends('layouts.app')

@section('title', 'Projects | RPL 17')

@section('main')
    <main class="main-home" style="position: relative; z-index: 999;">
        <div
            class="container text-center"
            data-aos="fade-up"
            data-aos-delay="100"
        >
            <div class="row mb-3">
                <div class="col-12">
                    <h1>Katalog Projects</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="subtitle-text d-none d-lg-block">
                    Tingkatkan soft skillmu, dengan begitu kamu dapat
                    <br />
                    melihat perkembanganmu dalam belajar
                    </p>
                    <p class="subtitle-text d-block d-lg-none">
                    Tingkatkan soft skillmu, dengan begitu kamu dapat melihat
                    perkembanganmu
                    <br />
                    dalam belajar
                    </p>
                </div>
            </div>
            <div class="app" style="position: relative; z-index: 999;">
                <div class="row mt-lg-2 mt-1 justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <img src="/images/search.svg" alt="">
                                </span>
                            </div>
                            <input type="text" name="ebook" id="input-project" placeholder="" class="form-control" autocomplete="off" v-model="search" style="padding: 20px;" placeholder="Masukkan Keyword..." aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-6" style="position: absolute; top: 60px; z-index: 99999;">
                    <div class="row">
                        <div class="col-12">
                            <a :href="project.url" class="card m-0" style="border-radius: 0; border-bottom: 1px solid rgb(196, 196, 196);  text-decoration: none" v-for="project in filteredList" v-if="search">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="thumbnail-box">
                                                <img :src="project.photo" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="title-box" style="color: black; font-weight: 500">
                                                @{{ project.name }}
                                            </div>
                                            <div class="subtitle-box text-black-50">
                                                By @{{ project.user }}
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="class-box text-black-50">
                                                @{{ project.class }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('content')
<section class="page-content-projects" style="position: static">
    <div class="container">
        <div class="row justify-content-center">
            @php
                $Iteration = 0;
            @endphp
            @forelse ($projects as $project)
            <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                <a
                    href="{{ $project->url }}"
                    target="_blank"
                    class="component-projects block"
                >
                    <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center mb-2">
                        <h6>{{ Str::limit($project->name, 25) }}</h6>
                        </div>
                        <div class="projects-thumbnail">
                        <div
                            class="projects-image"
                            style="
                            background-image: url('{{ Storage::url($project->photo) }}');
                            "
                        ></div>
                        <div
                            class="icon-eye d-flex justify-content-center align-items-center"
                        >
                            <img src="/images/eye-icon.svg" class="" alt="" />
                        </div>
                        </div>
                        <div
                        class="row justify-content-center align-items-center mt-3"
                        >
                        <div class="col-3">
                            <img
                            src="{{ Storage::url($project->user->photo) }}"
                            class="w-100 rounded-circle"
                            alt=""
                            style="height: 50px;"
                            />
                        </div>
                        <div class="col-7 d-block align-items-center">
                            <div class="title-projects">{{ Str::limit($project->user->name, 16) }}</div>
                            <div class="subtitle-projects">{{ $project->user->class }}</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </a>
            </div>
            @empty
                <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                    <div class="alert alert-info">
                        Project not found
                    </div>
                </div>
            @endforelse
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $projects->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            mounted() {
                AOS.init();
            },
            data: {
                search: '',
                projects: [
                    @foreach($projects as $project)
                        {
                            name: "{{ Str::limit($project->name, 18) }}",
                            user: "{{ $project->user->name }}",
                            class: "{{ $project->user->class }}",
                            url: "{{ $project->url }}",
                            photo: "{{ Storage::url($project->photo) }}",
                        },
                    @endforeach
                ]
            },
            computed: {
                filteredList() {
                    return this.projects.filter(project => {
                        return project.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        });
    </script>
    <script>
        var typed = new Typed('#input-project', {
        strings: [
            'Mau Lihat Project Teman Mu ?', 
            'Web Programming ?',
            'Android Programming ?',
            'Atau Desktop Programming ?',
            'Temukan Tutorial mu disini!',
        ],
        typeSpeed: 40,
        startDelay: 90,
        backSpeed: 40,
        attr: 'placeholder',
        bindInputFocusEvents: true,
        loop: true,
        contentType: 'html',
        });
    </script>
@endpush

