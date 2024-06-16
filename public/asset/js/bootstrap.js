import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.post('/api/message', { message: 'your_message_here' })
    .then(response => {
        console.log('Response from server:', response.data);
        // Xử lý dữ liệu phản hồi ở đây
    })
    .catch(error => {
        console.error('Error sending request:', error);
        // Xử lý lỗi ở đây
    });
