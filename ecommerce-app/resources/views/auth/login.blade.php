<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: center;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo h1 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
        }

        .logo p {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .input-group input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 2px rgba(37, 117, 252, 0.2);
            outline: none;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 8px;
        }

        .forgot-password {
            color: #2575fc;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .footer {
            margin-top: 25px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
            }

            .forgot-password {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>Admin Panel</h1>
            <p>Access your account securely</p>
        </div>

        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">email</label>
                <input type="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" name="password" required>
            </div>

            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="{{ route('forget-password') }}" class="#">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="footer">
            <p>&copy; 2025 Admin Panel. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
