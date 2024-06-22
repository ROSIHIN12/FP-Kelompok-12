<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            /* background-image: url('{{ asset('storage/background/bgcourse.jpg') }}'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
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
        .register-image {
            max-width: 50%;
            height: auto;
            margin-right: 20px;
        }
        .register-form {
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
            .register-container {
                flex-direction: column;
                text-align: center;
            }
            .register-image {
                margin: 0 0 20px 0;
                max-width: 100%;
            }
            .register-form {
                max-width: 100%;
            }
        }
        @media (max-width: 576px) {
            .register-container {
                padding: 20px;
            }
            .register-form {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <img src="{{ asset('storage/background/login-image.jpg') }}" alt="Register Image" class="register-image">
        <div class="register-form">
            <h2 class="text-center mb-4">{{ __('Register') }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="nama">{{ __('Nama') }}</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
                </div>

                <div class="form-group">
                    <a href="{{ route('auth.google') }}" class="btn btn-google w-100">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">
                        Register With Google
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
