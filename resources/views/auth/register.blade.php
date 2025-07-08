@extends('layout.base')

@section('title', 'Register')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">Register</h1>
                <p class="text-center text-muted">Create an account if you don t have one</p>

                <form action="{{ route('register') }}" method="post" class="row g-3" id="form-register">
                    @csrf

                    <div class="col-md-6">
                        <label for="firstname" class="label-control">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                            value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                        <small class="fw-bold text-danger" id="error-register-firstname">
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="lastname" class="label-control">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control"
                            value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                        <small class="fw-bold text-danger" id="error-register-lastname">

                        </small>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="label-control">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required autocomplete autofocus url-existEmail="{{ route('exist_email') }}" token="{{ csrf_token() }}">
                        <small class="fw-bold text-danger" id="error-register-email">

                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="label-control">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            value="{{ old('password') }}" required autocomplete="password" autofocus>
                        <small class="fw-bold text-danger" id="error-register-password">
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="password-confirm" class="label-control">Password confirmation</label>
                        <input type="password" name="password-confirm" id="password-confirm" class="form-control"
                            value="{{ old('password-confirm') }}" required autocomplete="password-confirm" autofocus>
                        <small class="fw-bold text-danger" id="error-register-password-confirm">
                        </small>
                    </div>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="agreeterms" />
                            <label class="form-check-label" for="agreeterms"> Agree Terms </label><br>
                            <small class="fw-bold text-danger" id="error-register-agreeterms">
                            </small>
                        </div>
                    </div>

                    <div class="d-grid gap-2 ">
                        <button class="btn btn-primary mb-3" type="button" id="register-user">
                            register
                        </button>
                    </div>

                    <p class="text-center text-muted mt-2">already have an account ? <a href="{{ route('login') }}">Sign
                            In</a></p>
                </form>
            </div>
        </div>
    </div>

@endsection
