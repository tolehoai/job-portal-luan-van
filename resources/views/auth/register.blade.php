@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <h4>Đăng ký</h4>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Họ và tên') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="title"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Chức danh') }}</label>

                                        <div class="col-md-6">
                                            <select id="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    name="title"
                                            >
                                                @foreach($jobTitles as $jobTitle)
                                                    <option value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="title"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Thành phố') }}</label>

                                        <div class="col-md-6">
                                            <select id="city"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    name="city"
                                            >
                                                @foreach($cities as $cities)
                                                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Số điện thoại') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   name="phone"
                                                   value="{{ old('phone') }}" required autocomplete="title"
                                                   autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Địa chỉ email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại mật khẩu') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required
                                                   autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <br>
                            <a href="{{route('login')}}">Đã có tài khoản, đăng nhập</a>
                            <br>
                            <br>
                            <a href="{{route('home.index')}}">Về trang chủ</a>

                        </div>
                    </div>
                    <div class="col-lg-6 register-half-bg  d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end"></p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#title').select2();
            $('#city').select2();
        });
    </script>
@stop
