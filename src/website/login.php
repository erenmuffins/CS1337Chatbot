<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./custom-chatbot-style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
            <form method="post" action="phptools/login_conn.php">
            <div class="txt-field">
                <input type="username" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt-field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login">

        </form>
            
        </div> 
</body>
</html>