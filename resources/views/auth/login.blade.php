@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <center>
    
    <div class="row justify-content-center" style="width:500px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#0d1a80;text-align:center;font-weight:bold;color:white;">{{ __('LOGIN') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <input id="email" type="email" class="forminput form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email" class="formlabel form-label"> Email</label>
                                    {{-- <label for="email" class="formlabel form-label">Email{{ __('') }}</label>
                                </div>
                            </div> --}}

                        {{-- For Email Input --}}
                        
                            <div class="row mb-3">
                                <div class="col">
                                        <div class="f-outline">
                                            <input id="email" type="email" class="forminput form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder=" ">
                                            <label for="email" class="formlabel form-label"> Email</label>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        {{-- For Password Input --}}
                            <div class="row mb-3">
                                <div class="col">
                                        <div class="f-outline">
                                            <input id="password" type="password" class="forminput form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder=" ">
                                            <label for="password" class="formlabel form-label">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        {{-- For Login Button --}}
                        <div class="row mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        {{-- For Forgot Password --}}
                        <div class="row mb-3">
                            <div class="col">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</center>

@endsection
