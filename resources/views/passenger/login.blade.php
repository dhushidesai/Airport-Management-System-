<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Login - Airport System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/images/airport1.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .user-icon { font-size: 50px; color: #57d17b; margin-bottom: 15px; }

        h2 { font-size: 24px; margin-bottom: 25px; font-weight: 600; }

        .input-group-text {
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
        }

        .form-control {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            padding: 12px;
            border-radius: 0 10px 10px 0;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: none;
            border-color: #57d17b;
        }

        .form-control::placeholder { color: #ddd; }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #57d17b;
            color: white;
            font-weight: 600;
            margin-top: 20px;
            transition: 0.3s;
        }

        .login-btn:hover { background: #45a862; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="user-icon">
            <i class="fa-solid fa-plane-circle-check"></i>
        </div>
        <h2>Passenger Login</h2>

        <form action="{{ url('/passenger/login') }}" method="POST">
            @csrf
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-passport"></i></span>
                <input type="text" name="passport_no" class="form-control" placeholder="Passport No" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>

</body>
</html>