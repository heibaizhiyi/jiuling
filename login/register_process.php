<?php
// 连接数据库
$servername = "localhost";
$username_db = "root";
$password_db = "root";
$dbname = "user";
$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 处理表单提交
if (isset($_POST['submit'])) {
    // 过滤和验证用户名和密码
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    if (empty($username)) {
        echo "<script>alert('用户名不能为空！');</script>";
        header('Refresh: 0;url=../register.php');
        exit;
    }
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if (empty($password)) {
        echo "<script>alert('密码不能为空！');</script>";
        header('Refresh: 0;url=../register.php');
        exit;
    }

    // 对输入进行防止SQL注入和XSS攻击的处理
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    // 查询数据库中是否存在该用户
    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 用户名已存在，返回注册页面并给出错误提示
        echo "<script>alert('用户名已存在，请重新输入！');</script>";
        header('Refresh: 0;url=../register.php');
        exit;
    } else {
        // 插入新用户到数据库
        $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            // 注册成功，跳转到登录页面
            echo "<script>alert('注册成功！请登录。');</script>";
            header('Refresh: 0;url=../index.php');
            exit;
        } else {
            // 注册失败，返回注册页面并给出错误提示
            echo "<script>alert('注册失败，请重新注册！');</script>";
            header('Refresh: 0;url=../register.php');
            exit;
        }
    }
}

// 关闭数据库连接
$conn->close();
?>
