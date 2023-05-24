<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>华夏修仙 - 注册</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        /* CSS 样式 */
    </style>
</head>

<body>
    <div class="container">
        <div class="register-form">
            <h2>注册</h2>
            <form action="register_process.php" method="POST">
                <input type="text" name="username" placeholder="用户名" required><br>
                <input type="password" name="password" placeholder="密码" required><br>
                <input type="submit" value="注册">
            </form>
            <p>已有账户？<a href="login.php">立即登录</a></p>
        </div>
    </div>
</body>

</html>
