import axios from "axios";

const api = axios.create({
    baseURL: "http://localhost:88/api/",
    headers: {
        'Authorization': `bearer ${localStorage.getItem('token')}`
    }
});

axios.interceptors.request.use(config => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers['Authorization'] = `Bearer ${token}`;
    }
    return config;
});

export default api;