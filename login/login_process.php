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
        exit;
    }
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if (empty($password)) {
        echo "<script>alert('密码不能为空！');</script>";
        exit;
    }

    // 对输入进行防止SQL注入和XSS攻击的处理
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    // 查询数据库中是否存在该用户
    $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 登录成功，跳转到其他页面
        echo "<script>alert('登录成功！');</script>";
        header('Location: ../index.php');
        exit;
    } else {
        // 登录失败，返回登录页面并给出错误提示
        echo "<script>alert('用户名或密码错误，请重新登录！');</script>";
        exit;
    }
}

// 关闭数据库连接
$conn->close();
?>
