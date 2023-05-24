<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>华夏修仙 - 登录</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        /* CSS 样式 */
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h2>登录</h2>
            <form action="login_process.php" method="POST">
                <input type="text" name="username" placeholder="用户名" required><br>
                <input type="password" name="password" placeholder="密码" required><br>
                <input type="submit" value="登录">
            </form>
            <p>还没有账户？<a href="register.php">立即注册</a></p>
        </div>
    </div>
</body>

</html>
