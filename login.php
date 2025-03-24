<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 110px;
            text-align: center;
        }

        .login-form {
            max-width: 300px;
            margin: 0 auto;
        }

        h1 {
            font-family: Cambria;
            font-size: 50px;
            color: white;
            /* background: -webkit-linear-gradient(#f77062 0%, #fe5196 100%); */
            /* -webkit-background-clip: text; */
            /* -webkit-text-fill-color: transparent; */
        }

        h3 {
            color: whitesmoke;
            font-family: Cambria;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 30px;
        }

        h5 {
            color: whitesmoke;
            font-family: Cambria;
            opacity: 80%;
            /* font-size: 30px; */
        }

        body {
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: Cambria;
            margin: 0;
            box-sizing: border-box;
        }

        html {
            overflow: hidden;
        }

        html,
        body {
            height: 100%;
        }

        label {
            color: white;
            font-size: 17px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to TASK-X</h1>
        <h5>Your Personal Task Management System</h5>

        <h3>Login Here</h3>
        <div class="login-form">
            <form method="post" action="login_process.php">
                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-outline-light" style="margin-right: 10px;">Login</button>
                <a href="register.php" class="btn btn-outline-light" role="button">Register</a>
            </form>
        </div>
    </div>
</body>

</html>