import axios from "axios";

const api = axios.create({
    baseURL: "http://localhost:88/api/",
    headers: {
        'Authorization': `bearer ${localStorage.getItem('token')}`
    }
});

export default api;