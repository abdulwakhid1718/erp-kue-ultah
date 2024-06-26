<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .register-container {
            margin-top: 100px;
            max-width: 400px;
        }

        .register-form {
            width: 100%;
            padding: 30px;
            background: #d2d9ff;
            border-radius: 10px;
            box-shadow: 6px 8px 10px rgba(0, 0, 0, 0.1);
        }

        .register-form .form-control {
            border-radius: 5px;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center register-container">
        <div class="register-form">
            <h2 class="text-center mb-4">Register</h2>
            <form id="register-form" action="{{ route('register.pelanggan') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama_pelanggan">Nama</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan"
                        placeholder="Enter your name" required />
                    @if ($errors->has('nama_pelanggan'))
                        <span class="error-message">{{ $errors->first('nama_pelanggan') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        placeholder="Enter username" required />
                    @if ($errors->has('username'))
                        <span class="error-message">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
                        required />
                    @if ($errors->has('email'))
                        <span class="error-message">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon"
                        placeholder="Enter phone number" required />
                    @if ($errors->has('nomor_telepon'))
                        <span class="error-message">{{ $errors->first('nomor_telepon') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter password" required />
                    @if ($errors->has('password'))
                        <span class="error-message">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
