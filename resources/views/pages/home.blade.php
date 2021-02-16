@extends('layouts.app')

@section('title', 'RPL 17')

@section('main')
    <main class="main-home">
        @if (session()->has('success'))
            <div class="flash-data-login-success" data-flashdata="{{ session()->get('success') }}"></div>
        @endif
        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-12">
                <h1 class="d-none d-lg-block">Rekayasa Perangkat Lunak</h1>
                <h1 class="d-block d-lg-none text-left">Rekayasa Perangkat Lunak</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <p class="subtitle-text d-none d-lg-block">satu bidang profesi yang mendalami cara-cara pengembangan
                    <br>
                    perangkat lunak termasuk pembuatan, pemeliharaan,
                    <br>
                    manajemen organisasi pengembangan perangkat lunak dan
                    <br>
                    manajemen kualitas.</p>
                <p class="subtitle-text d-block d-lg-none text-left mt-2">
                    satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak. perangkat lunak termasuk pembuatan, dan pemeliharaan.
                </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex d-lg-block" data-aos="zoom-in" data-aos-delay="200">
                <div class="card d-none d-lg-block">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4 offset-1">
                            <img src="/images/e-book.svg" class="w-100" alt="">
                            </div>
                            <div class="col-md-5">
                            <div class="title-card">E-Book</div>
                            <div class="subtitle-card">
                                sesuai urutan pembelajaran RPL
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4">
                            <img src="/images/project-icon.svg" class="w-100" alt="">
                            </div>
                            <div class="col-md-5">
                            <div class="title-card">Tutorial</div>
                            <div class="subtitle-card">pembelajaran jadi lebih mudah
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4">
                            <img src="/images/tutorial-icon.svg" class="w-100" alt="">
                            </div>
                            <div class="col-md-5">
                            <div class="title-card">Project</div>
                            <div class="subtitle-card">membuat projects untuk melatih skill
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <a href="#ebook" class="btn btn-ebook mr-2 d-flex d-lg-none page-scroll mt-3">E-BOOK GRATIS</a>
                <a href="#tutorial" class="btn btn-tutorial d-flex d-lg-none page-scroll mt-3">LIHAT TUTORIAL</a>
                </div>
            </div>
            </div>
        </div>
    </main>
@endsection

@section('content')
    <section class="page-content rpl-bahasa" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 header-title" data-aos="fade-up">
                    <h5 class="d-none d-lg-block">Apa Yang Akan Kita
                    <br>
                    Pelajari Di Jurusan RPL</h5>
                    <h5 class="d-block d-lg-none">Apa Yang Akan Kita Pelajari Di 
                    <br>
                    Jurusan RPL</h5>
                    <p class="text-muted mb-5">Bahasa pemrograman yang akan kita pelajari</p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="component-bahasa">
                            <div class="bahasa-img">
                                <img src="{{ url('/images/html.svg') }}" class="w-50" alt="">
                            </div>
                        <p class="title-bahasa html ml-2">HTML 5</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/css.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa css ml-3">CSS 3</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/js.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa js">Javascript</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/php.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa php ml-4">PHP</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/bootstrap.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa bootstrap">Bootstrap</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/laravel.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa laravel ml-2">Laravel</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/jquery.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa jquery ml-3">Jquery</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/phyton.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa phyton ml-2">Phyton</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="component-bahasa">
                        <div class="bahasa-img">
                            <img src="/images/codeigniter.svg" class="w-50" alt="">
                        </div>
                        <p class="title-bahasa codeigniter">Codeigniter</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            <section class="rpl-ebook" id="ebook">
            <div class="container">
                <div class="row text-center">
                <div class="col-12" data-aos="fade-up">
                    <h5>E-BOOK</h5>
                    <p class="text-muted d-none d-lg-block">Berikut adalah buku elektronik yang telah disusun
                    <br>
                    sesuai urutan pembelajaran rekayasa perangkat lunak</p>
                    <p class="text-muted d-block d-lg-none">
                    Berikut adalah buku elektronik yang telah disusun sesuai urutan  pembelajaran 
                    </p>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos="100">
                    <a href="https://drive.google.com/file/d/0B5PtcLuGa46nSWEwWHMyNW9sOFk/view?usp=sharing"
                        target="_blank" class="component-ebook block">
                    <div class="card">
                        <div class="card-body">
                        <div class="ebook-thumbnail">
                            <div class="ebook-image" style="background-image: url(/images/ebook-html.png);"></div>
                            <div class="icon-eye d-flex justify-content-center align-items-center">
                            <img src="/images/eye-icon.svg" class="" alt="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-7">
                            <div class="title-ebook">HTML 5 Dasar</div>
                            <div class="subtitle-ebook">untuk pemula</div>
                            </div>
                            <div class="col-5 d-flex align-items-center justify-content-end">
                            <img src="/images/icon-free.svg" class="icon-free" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://drive.google.com/file/d/0Bzg4OzK2yiK2dFlQR2VSMHIwckk/view?usp=sharing"
                        target="_blank" class="component-ebook block">
                    <div class="card">
                        <div class="card-body">
                        <div class="ebook-thumbnail">
                            <div class="ebook-image" style="background-image: url(/images/ebook-css-3.png);"></div>
                            <div class="icon-eye d-flex justify-content-center align-items-center">
                            <img src="/images/eye-icon.svg" class="" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                            <div class="title-ebook">CSS 3 Dasar</div>
                            <div class="subtitle-ebook">untuk pemula</div>
                            </div>
                            <div class="col-5 d-flex align-items-center justify-content-end">
                            <img src="/images/icon-free.svg" class="icon-free" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="https://drive.google.com/file/d/0B2bcR1VVyenlUk5PUXFzWC16NHM/view?usp=sharing"
                        target="_blank" class="component-ebook block">
                    <div class="card">
                        <div class="card-body">
                        <div class="ebook-thumbnail">
                            <div class="ebook-image" style="background-image: url(/images/ebook-js.png);"></div>
                            <div class="icon-eye d-flex justify-content-center align-items-center">
                            <img src="/images/eye-icon.svg" class="" alt="">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-7">
                            <div class="title-ebook">Javascript</div>
                            <div class="subtitle-ebook">untuk pemula</div>
                            </div>
                            <div class="col-5 d-flex align-items-center justify-content-end">
                            <img src="/images/icon-free.svg" class="icon-free" alt="">
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                </div>
                <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('ebook') }}" class="btn btn-see-more py-3 px-4">Selengkapnya</a>
                </div>
                </div>
            </div>
            </section>
            <section class="rpl-tools" id="tools">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                <div class="col-md-7" data-aos="fade-up">
                    <h5 class="d-none d-lg-block">Persiapan Pembuatan Web
                    <br>
                    Jadi Lebih Optimal
                    </h5>
                    <h5 class="d-block d-lg-none">Pembuatan Web
                    <br>
                    Jadi Lebih Optimal
                    </h5>
                    <p class="text-muted d-none d-lg-block">Kita akan menggunakan tools yang sering 
                    <br> 
                    digunakan oleh perusahaan besar IT di dunia
                    </p>
                    <p class="text-muted d-block d-lg-none">Kita akan menggunakan tools yang sering digunakan oleh perusahaan 
                    <br> 
                    besar IT di dunia
                    </p>
                </div>
                <div class="col-md-5 d-flex justify-content-end" data-aos="zoom-in" data-aos-delay="500">
                    <div class="img-tools d-none d-sm-block">
                    <img src="/images/image-tools.png" class="w-100" alt="">
                    </div>
                </div>
                </div>
            </div>
            </section>
            <section class="rpl-tutorial" id="tutorial">
            <div class="container justify-content-center">
                <div class="row align-items-center justify-content-center">
                <div class="col-md-5" data-aos="fade-up">
                    <h5>Belajar Lebih Terarah</h5>
                    <p class="text-muted">Dengan tutorial ini kalian lebih mudah
                    <br> 
                    memahami bahasa pemrograman
                    </p>
                    <div class="link-direction d-flex justify-content-center d-lg-block">
                    <a href="{{ route('tutorial') }}" class="btn btn-tutorial px-4 py-2 mt-2">ARAHKAN SAYA</a>
                    </div>
                </div>
                <div class="col-md-7 d-flex justify-content-end" data-aos="zoom-in" data-aos-delay="500">
                    <div class="img-tools d-none d-sm-block">
                    <img src="/images/img-direction.png" class="w-100" alt="">
                    </div>
                </div>
                </div>
            </div>
            </section>
            <section class="rpl-projects" id="projects">
            <div class="container">
                <div class="row text-center">
                <div class="col-12">
                    <h5>Projects</h5>
                    <p class="text-muted">Berikut adalah project yang telah kami buat</p>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <a href="https://web-calculator-js.netlify.app/"
                    target="_blank" class="component-projects block">
                    <div class="card">
                        <div class="card-body">
                        <div class="row justify-content-center mb-2">
                            <h6>Kalkulator Berbasis Web</h6>
                        </div>
                        <div class="projects-thumbnail">
                            <div
                            class="projects-image"
                            style="background-image: url(/images/project-kalkulator.png);"
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
                                src="/images/hafizh.png"
                                class="w-100 rounded-circle"
                                alt=""
                                style="height: 50px;"
                            />
                            </div>
                            <div class="col-7 d-block align-items-center">
                            <div class="title-projects">Hafizh Maulana..</div>
                            <div class="subtitle-projects">XI - RPL</div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <a href="https://kalkulator-zakat.herokuapp.com/"
                    target="_blank" class="component-projects block">
                    <div class="card">
                        <div class="card-body">
                        <div class="row justify-content-center mb-2">
                            <h6>Kalkulator Zakat</h6>
                        </div>
                        <div class="projects-thumbnail">
                            <div
                            class="projects-image"
                            style="background-image: url(/images/test-2.png);"
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
                                src="/images/hafizh.png"
                                class="w-100 rounded-circle"
                                alt=""
                                style="height: 50px;"
                            />
                            </div>
                            <div class="col-7 d-block align-items-center">
                            <div class="title-projects">Hafizh Maulana..</div>
                            <div class="subtitle-projects">XI - RPL</div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <a
                    href="https://aplikasi-pemantauan-covid.herokuapp.com/"
                    target="_blank"
                    class="component-projects block"
                    >
                    <div class="card">
                        <div class="card-body">
                        <div class="row justify-content-center mb-2">
                            <h6>Aplikasi Pemantauan COVID</h6>
                        </div>
                        <div class="projects-thumbnail">
                            <div
                            class="projects-image"
                            style="background-image: url(/images/project-covid.png);"
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
                                src="/images/hafizh.png"
                                class="w-100 rounded-circle"
                                alt=""
                                style="height: 50px;"
                            />
                            </div>
                            <div class="col-7 d-block align-items-center">
                            <div class="title-projects">Hafizh Maulana..</div>
                            <div class="subtitle-projects">XI - RPL</div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
                </div>
                <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('project') }}" class="btn btn-see-more py-3 px-4">Selengkapnya</a>
                </div>
                </div>
            </div>
            </section>
            <section class="rpl-achievement" id="achievement">
            <div class="container">
                <div class="row">
                <div class="col-12">
                    <h5>SISWA BERPRESTASI</h5>
                    <p class="text-muted text-center">Ikutilah jejak prestasi dia, cobalah hal
                    <br>
                    baru yang menjadikan dirimu tertantang
                    </p>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-10 col-md-4" data-aos="zoom-out-down" data-aos-delay="100">
                    <div class="component-achievement">
                    <div class="card">
                        <div class="card-body">
                        <div class="thumbnail d-flex justify-content-center">
                            <img src="/images/siswa-1.png" class="w-50 d-none d-lg-block" alt="">
                            <img src="/images/siswa-1.png" class="w-50 d-block d-lg-none" style="height: 120px;" alt="">
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <div class="title-achievement">Muhammad Kautsar Panggawa</div>
                            <div class="subtitle-achievement">
                                <div class="juara-text">
                                Juara 1
                                </div>
                                Lomba LKS Web Teknologi Tingkat Wilayah Jakarta Barat II
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-10 col-md-4" data-aos="zoom-out-down" data-aos-delay="500">
                    <div class="component-achievement">
                    <div class="card">
                        <div class="card-body">
                        <div class="thumbnail d-flex justify-content-center">
                            <img src="/images/siswa-2.png" class="w-50 d-none d-lg-block" alt="">
                            <img src="/images/siswa-2.png" class="w-50 d-block d-lg-none" style="height: 120px;" alt="">
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <div class="title-achievement">Muhammad Kholillulloh</div>
                            <div class="subtitle-achievement">
                                <div class="juara-text">
                                Juara 3 
                                </div>
                                Lomba LKS Web Teknologi Tingkat Wilayah Jakarta Barat II
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
