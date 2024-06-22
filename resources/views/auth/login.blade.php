<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 100%;
            max-width: 900px;
        }
        .login-image {
            max-width: 50%;
            height: auto;
            margin-right: 20px;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
        }
        .btn-google {
            background-color: #db4437;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-google img {
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                text-align: center;
            }
            .login-image {
                margin: 0 0 20px 0;
                max-width: 100%;
            }
            .login-form {
                max-width: 100%;
            }
        }
        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }
            .login-form {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('storage/background/login-image.jpg') }}" alt="Login Image" class="login-image">
        <div class="login-form">
            <h2 class="text-center mb-4">{{ __('Login') }}</h2>
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
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                </div>

                <div class="form-group">
                    <a href="{{ route('auth.google') }}" class="btn btn-google w-100">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">
                        Login With Google
                    </a>
                </div>

                @if (Route::has('password.request'))
                    <a class="btn btn-link d-block text-center" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                @endif

                <!-- Menampilkan pesan kesalahan jika ada -->
                @if(session('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Throttle Error Message -->
                @if ($errors->has('email'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                @if ($errors->has('throttle'))
                    <div class="alert alert-warning mt-2">
                        Terlalu banyak percobaan login. Silakan coba lagi dalam beberapa detik.
                    </div>
                @endif
                
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
