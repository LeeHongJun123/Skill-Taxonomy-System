<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Skill Taxonomy System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .system-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            margin: auto;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .footer {
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="system-title">Skill Taxonomy System</div>
    <form class="form-signin" method="POST" action="">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <br>
        <br>
        <br>
        <a href="{{ route("acc.login") }}" class="btn btn-primary">login Here</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
    </form>
</div>
<footer class="footer">
    <p>&copy; 2024 Your Company. All rights reserved.</p>
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
