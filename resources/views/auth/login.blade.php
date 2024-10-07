@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        height: 100vh;
    }
    .row {
        height: 100%;
    }
    .card-container {
        display: flex; /* Use flexbox to align items */
        justify-content: center; /* Center the card horizontally */
        align-items: center; /* Center the card vertically */
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 95%; /* Set card width equal to image width */
        display: flex; /* Use flexbox */
        flex-direction: column; /* Stack the card elements vertically */
    }
    .card-img {
        width: 95%;
        border-top-left-radius: 10px; /* Round corners */
        border-bottom-left-radius: 10px; /* Round corners */
        object-fit: cover; /* Ensure image covers the area */
    }
    .card-body {
        width: 100%; /* Full width for the form */
        padding: 2rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-link {
        color: #007bff;
    }
    .btn-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    .form-group label {
        font-weight: bold;
    }
    .card-header {
        background-color: #00d9ff;
        color: white;
        text-align: center; /* Center the header text */
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        padding: 1rem; /* Add padding */
        margin: 0; /* Remove margin */
        width: 100%; /* Full width */
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6 card-container">
            {{-- <img src="{{ asset('images/car.jpg') }}" class="card-img" alt="Login Image"> <!-- Add your image here --> --}}
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4>{{ __('Login') }}</h4>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group text-center mt-3">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
