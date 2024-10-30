<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s;
        }
        .login-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .login-title {
            font-weight: bold;
            color: #495057;
        }
        .btn-login {
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-login:hover {
            background-color: #45a049;
        }
        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
        }
    </style>
</head>
<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card login-card p-4">

            <h2 class="text-center login-title mb-4">Login</h2>
            <form action="{{ url('login') }}" method="POST">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login w-100 py-2">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none text-muted">Forgot password?</a>
                <br>Not Registered?
                <a href={{url('/register')}} class="text-decoration-none text-muted">Register Now</a><br>
                Back to 
                <a href={{url('/')}} class="text-decoration-none text-muted">Home</a>
            
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
