@extends('FE.layout_user')

@section('content')


<main class="d-flex w-100" id="sign-up">
    <div class="container d-flex flex-column">
        <div class="row vh-100">

            <div class="container" style=" position: absolute;   max-width: 70%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: auto;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div style="text-align: center;" class="card-header">{{ __('Đăng ký') }}</div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('province_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Tên') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>


                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">


                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Tỉnh/Thành') }}</label>
                                        <div class="col-md-6">
                                            <select
                                                class="form-control m-bot15 @error('province_id') is-invalid @enderror"
                                                id="country_id" name="province_id">
                                                <option value="0" selected>Tỉnh/Thành</option>
                                                @foreach($countries as $country)

                                                <option value="{{ $country->provinceid }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mb-3" id="city" style="display: none">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Quận/Huyện') }}</label>
                                        <div class="col-md-6">
                                            <select
                                                class="form-control m-bot15 @error('district_id') is-invalid @enderror"
                                                id="state_id" name="district_id">

                                            </select>

                                        </div>
                                    </div>

                                    <div class="row mb-3" id="address" style="display: none">

                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Xã/Ngõ/Số nhà') }}</label>
                                        <div class="col-md-6">
                                            <input name="address" id="address" class="form-control"
                                                value="{{ old('address') }}" />

                                        </div>


                                    </div>
                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Số điện thoại') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone " value="{{ old('phone') }}" type="text"
                                                class="form-control" name="phone" required>
                                            @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">


                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Nhâp lại mật khẩu') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-12 " style="    text-align: center;">
                                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">
                                                {{ __('Đăng ký') }}
                                            </button>

                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                {{ __('Đăng nhập') }}
                                            </a>
                                        </div>
                                        <div class="col-md-12 " style="text-align: center;">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection