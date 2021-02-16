@extends('layouts.app')

@section('title', 'Tutorials | RPL 17')

@section('main')
    <main class="main-home" style="position: relative; z-index: 999;">
        <div
            class="container text-center"
            data-aos="fade-up"
            data-aos-delay="100"
        >
            <div class="row mb-3">
                <div class="col-12">
                    <h1>Katalog Tutorials</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="subtitle-text d-none d-lg-block">
                    Yuk nonton tutorial berikut ini. dengan adanya tutorial
                    <br />
                    dapat membantu pemahaman dalam belajar
                    </p>
                    <p class="subtitle-text d-block d-lg-none">
                    Yuk nonton tutorial berikut ini. dengan adanya tutorial dapat
                    membantu
                    <br />
                    pemahaman dalam belajar
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
                            <input type="text" name="ebook" id="input-tutorial" placeholder="" class="form-control" autocomplete="off" v-model="search" style="padding: 20px;" placeholder="Masukkan Keyword..." aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-6" style="position: absolute; top: 60px; z-index: 99999;">
                    <div class="row">
                        <div class="col-12">
                            <a :href="tutorial.url" class="card m-0" style="border-radius: 0; border-bottom: 1px solid rgb(196, 196, 196);  text-decoration: none" v-for="tutorial in filteredList" v-if="search">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="thumbnail-box">
                                                <img :src="tutorial.photo" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-5">
                                            <div class="title-box" style="color: black; font-weight: 500">
                                                @{{ tutorial.name }}
                                            </div>
                                            <div class="subtitle-box text-black-50">
                                                By @{{ tutorial.user }}
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-3">
                                            <div class="price-thumbnail">
                                                <img :src="tutorial.level" alt="" class="w-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-3 mt-2">
                <div class="col-12 col-md-12 d-block d-lg-flex justify-content-center">
                    <div class="tab-text mr-4 d-none d-lg-flex align-items-center mb-0">
                    <p class="text-white">By category:</p>
                    </div>
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item d-block d-lg-none d-flex align-items-center mr-3" role="presentation" style="color: #dddddd">
                            By Category :
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active mb-2 mb-lg-0" id="pills-home-tab" data-toggle="pill" href="#pills-semua" role="tab" aria-controls="pills-home" aria-selected="true">Semua</a>
                        </li>
                        <li class="nav-item mb-2 mb-lg-0" role="presentation">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pemula</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Menengah</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">All Levels</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('content')
<section class="page-content-tutorial rpl-tutorial" style="position: static">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row justify-content-center mt-3 mt-lg-0">
                    @php
                        $Iteration = 0;
                    @endphp
                    @forelse ($tutorials as $tutorial)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a
                                href="{{ $tutorial->url }}"
                                target="_blank"
                                class="component-tutorial block"
                            >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-8">
                                                <div class="title-tutorial">{{ Str::limit($tutorial->name, 16) }}</div>
                                                <div class="subtitle-tutorial">{{ $tutorial->user->name }}</div>
                                            </div>
                                            <div
                                                class="col-4 d-flex align-items-center justify-content-end"
                                            >
                                                <div class="image-tutorial">
                                                <img
                                                    src="/images/{{ $tutorial->level->photo }}"
                                                    class="w-100"
                                                    alt=""
                                                />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tutorial-thumbnail">
                                            <div
                                                class="tutorial-image"
                                                style="background-image: url('{{ Storage::url($tutorial->photo) }}');"
                                            >
                                            </div>
                                            <div
                                                class="icon-eye d-flex justify-content-center align-items-center"
                                            >
                                                <img src="/images/icon-play.svg" class="" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Tutorial not found
                                </div>
                            </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $tutorials->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row justify-content-center">
                    @php
                        $Iteration = 0;
                    @endphp
                    @forelse ($tutorialsPemula as $tutorial)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a
                                href="{{ $tutorial->url }}"
                                target="_blank"
                                class="component-tutorial block"
                            >
                                <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
                                    <div class="col-8">
                                        <div class="title-tutorial">{{ Str::limit($tutorial->name, 16) }}</div>
                                        <div class="subtitle-tutorial">{{ $tutorial->user->name }}</div>
                                    </div>
                                    <div
                                        class="col-4 d-flex align-items-center justify-content-end"
                                    >
                                        <div class="image-tutorial">
                                        <img
                                            src="/images/{{ $tutorial->level->photo }}"
                                            class="w-100"
                                            alt=""
                                        />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tutorial-thumbnail">
                                    <div
                                        class="tutorial-image"
                                        style="background-image: url('{{ Storage::url($tutorial->photo) }}');"
                                    ></div>
                                    <div
                                        class="icon-eye d-flex justify-content-center align-items-center"
                                    >
                                        <img src="/images/icon-play.svg" class="" alt="" />
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Tutorial not found
                                </div>
                            </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $tutorialsPemula->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row justify-content-center">
                    @php
                        $Iteration = 0;
                    @endphp
                    @forelse ($tutorialsMenengah as $tutorial)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a
                                href="{{ $tutorial->url }}"
                                target="_blank"
                                class="component-tutorial block"
                            >
                                <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
                                    <div class="col-8">
                                        <div class="title-tutorial">{{ Str::limit($tutorial->name, 16) }}</div>
                                        <div class="subtitle-tutorial">{{ $tutorial->user->name }}</div>
                                    </div>
                                    <div
                                        class="col-4 d-flex align-items-center justify-content-end"
                                    >
                                        <div class="image-tutorial">
                                        <img
                                            src="/images/{{ $tutorial->level->photo }}"
                                            class="w-100"
                                            alt=""
                                        />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tutorial-thumbnail">
                                    <div
                                        class="tutorial-image"
                                        style="background-image: url('{{ Storage::url($tutorial->photo) }}');"
                                    ></div>
                                    <div
                                        class="icon-eye d-flex justify-content-center align-items-center"
                                    >
                                        <img src="/images/icon-play.svg" class="" alt="" />
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Tutorial not found
                                </div>
                            </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $tutorialsMenengah->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row justify-content-center">
                    @php
                        $Iteration = 0;
                    @endphp
                    @forelse ($tutorialsAll as $tutorial)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a
                                href="{{ $tutorial->url }}"
                                target="_blank"
                                class="component-tutorial block"
                            >
                                <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
                                    <div class="col-8">
                                        <div class="title-tutorial">{{ Str::limit($tutorial->name, 16) }}</div>
                                        <div class="subtitle-tutorial">{{ $tutorial->user->name }}</div>
                                    </div>
                                    <div
                                        class="col-4 d-flex align-items-center justify-content-end"
                                    >
                                        <div class="image-tutorial">
                                        <img
                                            src="/images/{{ $tutorial->level->photo }}"
                                            class="w-100"
                                            alt=""
                                        />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tutorial-thumbnail">
                                    <div
                                        class="tutorial-image"
                                        style="background-image: url('{{ Storage::url($tutorial->photo) }}');"
                                    ></div>
                                    <div
                                        class="icon-eye d-flex justify-content-center align-items-center"
                                    >
                                        <img src="/images/icon-play.svg" class="" alt="" />
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Tutorial not found
                                </div>
                            </div>
                    @endforelse
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $tutorialsAll->links('pagination::bootstrap-4') }}
                    </div>
                </div>
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
                tutorials: [
                    @foreach($tutorials as $tutorial)
                        {
                            name: "{{ Str::limit($tutorial->name, 18) }}",
                            level: "images/{{ $tutorial->level->photo }}",
                            user: "{{ Str::limit($tutorial->user->name, 16) }}",
                            url: "{{ $tutorial->url }}",
                            photo: "{{ Storage::url($tutorial->photo) }}",
                        },
                    @endforeach
                ]
            },
            computed: {
                filteredList() {
                    return this.tutorials.filter(tutorial => {
                        return tutorial.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        });
    </script>
    <script>
        var typed = new Typed('#input-tutorial', {
        strings: [
            'Mau Nonton Tutorial apa hari ini ?', 
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
