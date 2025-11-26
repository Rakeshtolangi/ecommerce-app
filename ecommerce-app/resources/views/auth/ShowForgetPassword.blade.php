<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
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

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
        }

        .logo {
            margin-bottom: 25px;
        }

        .logo h1 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
        }

        .logo p {
            color: #666;
            font-size: 14px;
            margin-top: 10px;
            line-height: 1.5;
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

        .reset-btn {
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
            margin-bottom: 20px;
        }

        .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .reset-btn:active {
            transform: translateY(0);
        }

        .back-to-login {
            color: #2575fc;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-top: 15px;
        }

        .back-to-login:hover {
            text-decoration: underline;
        }

        .instructions {
            background-color: #f8f9fa;
            border-left: 4px solid #2575fc;
            padding: 15px;
            margin-bottom: 25px;
            text-align: left;
            border-radius: 0 4px 4px 0;
        }

        .instructions h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .instructions ul {
            padding-left: 20px;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        .instructions li {
            margin-bottom: 8px;
        }

        .success-message {
            display: none;
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: left;
            border-left: 4px solid #28a745;
        }

        .footer {
            margin-top: 25px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Reset Your Password</h1>
            <p>Enter your email address and we'll send you instructions to reset your password.</p>
        </div>

        <div class="instructions">
            <h3>Instructions:</h3>
            <ul>
                <li>Enter the email address associated with your account</li>
                <li>Check your email for a password reset link</li>
                <li>Follow the instructions in the email to create a new password</li>
                <li>The reset link will expire in 24 hours for security</li>
            </ul>
        </div>

        <form id="resetForm">
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" placeholder="Enter your email address" required>
            </div>

            <button type="submit" class="reset-btn">Send Reset Instructions</button>
        </form>

        <div class="success-message" id="successMessage">
            <strong>Success!</strong> Password reset instructions have been sent to your email address. Please check your inbox and follow the instructions to reset your password.
        </div>

        <a href="{{ route('ShowLogin') }}" class="#">← Back to Login</a>

        <div class="footer">
            <p>&copy; 2025 Admin Panel. All rights reserved.</p>
        </div>
    </div>

    <script>
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;

            // Simple validation
            if(email === '') {
                alert('Please enter your email address');
                return;
            }

            // Email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            // Show success message
            document.getElementById('successMessage').style.display = 'block';

            // In a real application, you would send this data to a server
            console.log('Password reset requested for:', email);

            // Reset form
            document.getElementById('resetForm').reset();
        });

        // Back to login functionality
        document.querySelector('.back-to-login').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Redirecting to login page...');
            // In a real application, you would redirect to the login page
            // window.location.href = 'login.html';
        });
    </script>
</body>
</html>
