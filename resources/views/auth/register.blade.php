@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="page-content page-auth pt-0" id="register">
        <section class="store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row row-login justify-content-center">
                <div class="col-lg-5">
                    <h2 class="mb-4 d-none d-lg-block">
                    Untuk mengakses web RPL<br />
                    silahkan daftar dirimu!
                    </h2>
                    <h2 class="mb-4 mt-4 d-block d-lg-none">
                    Untuk mengakses web<br />
                    Yuk daftarkan dirimu!
                    </h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            autofocus
                            value="{{ old('name') ?? '' }}"
                            />
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nickname">Nick Name</label>
                            <input
                            type="text"
                            name="nickname"
                            id="nickname"
                            class="form-control"
                            value="{{ old('nickname') ?? '' }}"
                            />
                            @error('nickname')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            @change="checkEmail()"
                            :class="{'is-invalid' : this.email_unavailable}"
                            v-model="email"
                            />
                            @error('email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            />
                            @error('password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input
                            type="password"
                            name="password_confirmation"
                            id="password-confirm"
                            class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" id="class" class="form-control">
                                <option disabled selected>-- Select Class --</option>
                                <option value="Class 10">Class 10</option>
                                <option value="Class 11">Class 11</option>
                                <option value="Class 12">Class 12</option>
                            </select>
                            @error('class')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="submit" :disabled="email_unavailable" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-dark btn-block mt-4">Back To Home</a>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.use(Toasted);

        var register = new Vue({
            el: '#register',
            mounted() {
                AOS.init();
            },
            methods: {
                checkEmail: function() {
                    let self = this;
                    axios.get('{{ route('api-check-register') }}', {
                        params: {
                            email: this.email
                        }
                    })
                        .then(function (response) {
                            if (response.data == 'available') {
                            self.$toasted.show(
                                    "Email Tersedia silahkan lanjutkan pendaftaran.", {
                                        position: 'top-center',
                                        className: "rounded",
                                        duration: 2000,
                                    }
                                );
                                self.email_unavailable = false;
                            } else {
                                self.$toasted.error(
                                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                        position: 'top-center',
                                        className: "rounded",
                                        duration: 2000,
                                    }
                                );
                                self.email_unavailable = true;
                                
                            }
                            console.log(response);
                });

                }
            },
            data() {
                return {
                    email_unavailable: false,
                }
            },
        });
    </script>
@endpush