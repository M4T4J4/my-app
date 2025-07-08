@extends('layout.base')

@section('title', 'Register')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">please sign in</h1>
                <p class="text-center text-muted">Your article are waiting for you</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    @error('email')
                        <div class="alert alert-danger text-center" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('password')
                        <div class="alert alert-danger text-center" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="email">Email</label>
                    <input type="email" name="email" id="password" class="form-control mb-3 @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autocomplete autofocus>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mb-3 @error('password') is-invalid @enderror" required
                        autocomplete="current-password">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
                    <div class="d-grid gap-2 ">
                        <button class="btn btn-primary mb-3" type="submit">
                            Sign In
                        </button>
                    </div>

                    <p class="text-center text-muted mt-2">Not registered yet ? <a href="{{ route('register') }}">create an account</a></p>

                </form>
            </div>
        </div>
    </div>

@endsection
