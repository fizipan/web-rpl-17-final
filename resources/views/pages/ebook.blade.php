@extends('layouts.app')

@section('title', 'Ebooks | RPL 17')

@section('main')
    <main class="main-home" style="position: relative; z-index: 999;">
        <div
            class="container text-center"
            data-aos="fade-up"
            data-aos-delay="100"
        >
            <div class="row mb-3">
                <div class="col-12">
                    <h1>Katalog E-Books</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="subtitle-text d-none d-lg-block">
                    Ayo terus belajar, dengan dukungan E-Book kita dapat belajar
                    <br />
                    tanpa harus ketinggalan teknologi yang ada
                    </p>
                    <p class="subtitle-text d-block d-lg-none">
                    Ayo terus belajar, dengan dukungan
                    <br />
                    E-Book kita dapat belajar tanpa harus ketinggalan teknologi yang
                    ada
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
                            <input type="text" name="ebook" placeholder="" class="form-control" id="input-ebook" onclick="stop()" autocomplete="off" v-model="search" style="padding: 20px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-6" style="position: absolute; top: 60px; z-index: 99999;">
                    <div class="row">
                        <div class="col-12">
                            <a :href="ebook.url" class="card m-0" style="border-radius: 0; border-bottom: 1px solid rgb(196, 196, 196);  text-decoration: none" v-for="ebook in filteredList" v-if="search">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <div class="thumbnail-box">
                                                <img :src="ebook.photo" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-5">
                                            <div class="title-box" style="color: black; font-weight: 500">
                                                @{{ ebook.name }}
                                            </div>
                                            <div class="subtitle-box text-black-50">
                                                @{{ ebook.level }}
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-3">
                                            <div class="price-thumbnail">
                                                <img :src="ebook.price" alt="" class="w-100">
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
                        <li class="nav-item" role="presentation">
                            <a class="nav-link mb-2 mb-lg-0" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pemula</a>
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
<section class="page-content-ebook rpl-ebook" style="position: static;">
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row justify-content-center">
                        @php
                            $Iteration = 0;
                        @endphp
                        @forelse ($ebooks as $ebook)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                                <a href="{{ $ebook->url }}"
                                    target="_blank" class="component-ebook block">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ebook-thumbnail">
                                                <div 
                                                class="ebook-image"
                                                style="background-image: url('{{ Storage::url($ebook->photo) }}');">
                                                </div>
                                                <div class="icon-eye d-flex justify-content-center align-items-center">
                                                    <img src="/images/eye-icon.svg" class="" alt="" />
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <div class="title-ebook">{{ Str::limit($ebook->name, 16) }}</div>
                                                    <div class="subtitle-ebook">{{ $ebook->level->name }}</div>
                                                </div>
                                                <div class="col-4 d-flex align-items-center justify-content-end">
                                                    <img src="/images/{{ $ebook->price->photo }}" class="icon-free" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        </div>
                        @empty
                        <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                            <div class="alert alert-info">
                                Ebook not found
                            </div>
                        </div>
                        @endforelse    
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            {{ $ebooks->links('pagination::bootstrap-4') }}
                        </div>
                    </div>      
                </div>  
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row justify-content-center">
                        @php
                            $Iteration = 0;
                        @endphp
                        @forelse ($ebooksPemula as $ebook)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a href="{{ $ebook->url }}"
                                target="_blank" class="component-ebook block">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ebook-thumbnail">
                                            <div class="ebook-image" 
                                            style="background-image: url('{{ Storage::url($ebook->photo) }}')"></div>
                                            <div class="icon-eye d-flex justify-content-center align-items-center">
                                                <img src="/images/eye-icon.svg" class="" alt="" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="title-ebook">{{ Str::limit($ebook->name, 18) }}</div>
                                                <div class="subtitle-ebook">{{ $ebook->level->name }}</div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center justify-content-end">
                                                <img src="/images/{{ $ebook->price->photo }}" class="icon-free" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                            <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Ebook not found
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $ebooksPemula->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row justify-content-center">
                        @php
                            $Iteration = 0;
                        @endphp
                        @forelse ($ebooksMenengah as $ebook)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a href="{{ $ebook->url }}"
                                target="_blank" class="component-ebook block">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ebook-thumbnail">
                                            <div class="ebook-image" 
                                            style="background-image: url('{{ Storage::url($ebook->photo) }}')"></div>
                                            <div class="icon-eye d-flex justify-content-center align-items-center">
                                                <img src="/images/eye-icon.svg" class="" alt="" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="title-ebook">{{ Str::limit($ebook->name, 18) }}</div>
                                                <div class="subtitle-ebook">{{ $ebook->level->name }}</div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center justify-content-end">
                                                <img src="/images/{{ $ebook->price->photo }}" class="icon-free" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                            <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Ebook not found
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $ebooksMenengah->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="row justify-content-center">
                        @php
                            $Iteration = 0;
                        @endphp
                        @forelse ($ebooksAll as $ebook)
                        <div class="col-11 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $Iteration += 100 }}">
                            <a href="{{ $ebook->url }}"
                                target="_blank" class="component-ebook block">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="ebook-thumbnail">
                                            <div class="ebook-image" 
                                            style="background-image: url('{{ Storage::url($ebook->photo) }}')"></div>
                                            <div class="icon-eye d-flex justify-content-center align-items-center">
                                                <img src="/images/eye-icon.svg" class="" alt="" />
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="title-ebook">{{ Str::limit($ebook->name, 18) }}</div>
                                                <div class="subtitle-ebook">{{ $ebook->level->name }}</div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center justify-content-end">
                                                <img src="/images/{{ $ebook->price->photo }}" class="icon-free" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                            <div class="col-12 d-flex justify-content-center" style="margin-top: 50vh">
                                <div class="alert alert-info">
                                    Ebook not found
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $ebooksAll->links('pagination::bootstrap-4') }}
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
                ebooks: [
                    @foreach($ebooks as $ebook)
                        {
                            name: "{{ Str::limit($ebook->name, 18) }}",
                            level: "{{ $ebook->level->name }}",
                            price: "images/{{ $ebook->price->photo }}",
                            url: "{{ $ebook->url }}",
                            photo: "{{ Storage::url($ebook->photo) }}",
                        },
                    @endforeach
                ]
            },
            computed: {
                filteredList() {
                    return this.ebooks.filter(ebook => {
                        return ebook.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        });
    </script>
    <script>
        var typed = new Typed('#input-ebook', {
        strings: [
            'Mau baca buku apa hari ini ?', 
            'Web Programming ?',
            'Android Programming ?',
            'Atau Desktop Programming ?',
            'Temukan bukumu disini!',
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

