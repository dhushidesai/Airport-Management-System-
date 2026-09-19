<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{

            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(rgba(0,0,0,0.65),
            rgba(0,0,0,0.65)),

            url('/images/airport1.jpg');

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
        }

        .login-box{

            width:400px;

            padding:40px;

            border-radius:20px;

            background:rgba(255,255,255,0.08);

            backdrop-filter:blur(10px);

            border:1px solid rgba(255,255,255,0.15);

            text-align:center;

            color:white;
        }

        .login-box i{

            font-size:45px;

            color:#4da3ff;

            margin-bottom:18px;
        }

        .login-box h2{

            margin-bottom:30px;

            font-weight:600;
        }

        .form-control{

            height:50px;

            border:none;

            border-radius:12px;

            margin-bottom:20px;
        }

        .form-control:focus{

            box-shadow:none;
        }

        .form-check-label{

            font-size:14px;
        }

        .forgot-link{

            text-decoration:none;

            color:#4da3ff;

            font-size:14px;
        }

        .forgot-link:hover{

            color:white;
        }

        .login-btn{

            width:100%;

            height:50px;

            border:none;

            border-radius:12px;

            background:#0d6efd;

            color:white;

            font-size:16px;

            font-weight:600;

            transition:0.3s;
        }

        .login-btn:hover{

            background:white;
            color:#0d6efd;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <i class="fa-solid fa-user-shield"></i>

        <h2>Admin Login</h2>

        <form action="/admin/login" method="post">
            @csrf

            <input type="text"
            name="username"
            class="form-control"
            placeholder="Enter Username">

            <input type="password"
            name="password"
            class="form-control"
            placeholder="Enter Password">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">

                    <input class="form-check-input"
                    type="checkbox"
                    id="remember">

                    <label class="form-check-label text-white"
                    for="remember">

                        Remember Me

                    </label>

                </div>

                <a href="#"
                class="forgot-link">

                    Forgot Password?

                </a>

            </div>

            <button class="login-btn">

                Login

            </button>

        </form>

    </div>

</body>

</html>