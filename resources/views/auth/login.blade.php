@extends('mainlayouts.mainMaster')

<div class="page-header" style="background: url('{{ asset('assets/img/banner1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div style="padding-top:50px;" class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{url('main/index')}}">Home /</a></li>
                        <li class="current">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="login section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="login-form login-area">
                    <h3>Login Now</h3>
                    <form role="form" class="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Keep me logged in</label>
                            </div>
                            <a class="forgetpassword" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-common log-btn">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
