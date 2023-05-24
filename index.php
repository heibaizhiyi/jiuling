<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>华夏修仙 - 首页</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        /* CSS 样式 */
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('.feature-item').hover(function() {
                var title = $(this).data('title');
                var content = $(this).data('content');
                $('.feature-tooltip').html('<h3>' + title + '</h3><p>' + content + '</p>').show();
            }, function() {
                $('.feature-tooltip').hide();
            });

            $('a[href="#login"]').click(function(event) {
                event.preventDefault();
                alert("跳转到登录界面");
                // 在这里执行登录相关操作或跳转到登录界面的代码
                window.location.href = "login.php"; // 修改为实际的登录页面 URL
            });

            $('a[href="#register"]').click(function(event) {
                event.preventDefault();
                alert("跳转到注册界面");
                // 在这里执行注册相关操作或跳转到注册界面的代码
                window.location.href = "register.php"; // 修改为实际的注册页面 URL
            });

            $('a[href="#reset"]').click(function(event) {
                event.preventDefault();
                alert("跳转到密码重置界面");
                // 在这里执行密码重置相关操作或跳转到密码重置界面的代码
                window.location.href = "reset.php"; // 修改为实际的密码重置页面 URL
            });
        });
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const loggedIn = checkLoggedIn(); // 检查用户是否已登录

            if (!loggedIn) {
                // 如果用户未登录，则禁止访问其他页面，显示提示信息
                const links = document.querySelectorAll('a');
                links.forEach((link) => {
                    link.addEventListener('click', (event) => {
                        event.preventDefault();
                        alert('您还未登录，请先登录！');
                    });
                });
            }
        });

        function checkLoggedIn() {
            // 在此处编写检查用户登录状态的逻辑
            // 返回 true 如果用户已登录，否则返回 false
            // 可以使用浏览器存储（如 localStorage）或后端验证来实现登录状态的检查
            // 这里仅提供一个示例，您需要根据您的实际情况进行修改

            // 假设登录状态存储在 localStorage 中的 loggedIn 字段中
            const loggedIn = localStorage.getItem('loggedIn');

            return loggedIn === 'true';
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul class="feature-list">
                <li>
                    <a href="#login" class="feature-item" data-title="登录功能" data-content="通过注册账户和密码，登录进入修仙世界。">登录功能</a>
                </li>
                <li>
                    <a href="#register" class="feature-item" data-title="注册功能" data-content="新用户可以注册账户，并创建属于自己的修仙角色。">注册功能</a>
                </li>
                <li>
                    <a href="#reset" class="feature-item" data-title="密码重置功能" data-content="忘记密码时，可以通过密码重置功能找回密码。">密码重置功能</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <h1>华夏修仙</h1>
            <p>欢迎来到华夏修仙世界！这里是一个神奇的修仙世界，您可以通过修炼来提升自己的修仙境界，探索各种奇幻的修仙之路。</p>
            <p>登录后，您可以体验更多的修仙功能，并与其他修仙者交流、切磋。</p>
        </div>
    </div>
    <div class="feature-tooltip"></div>
</body>

</html>
