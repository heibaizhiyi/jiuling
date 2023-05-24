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
