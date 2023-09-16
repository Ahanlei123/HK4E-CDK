function getContent() {
    // 获取编辑框中的 uid 和 cmd 参数值
    const uid = document.getElementById('uid').value.trim();
    const cmd = 'mrlb';

    // 发送 AJAX 请求
    axios.get(`/get-content.php?uid=${uid}&cmd=${cmd}`)
        .then(response => {
            if (response.data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '成功',
                    text: response.data.message
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: '失败',
                    text: response.data.message
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: '出错了',
                text: '发生未知错误，请稍后再试。'
            });
        });
}