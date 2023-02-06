export default {
    auth(to, from, next) {
        const token = localStorage.getItem('token');

        if (!token) {
            next('/login');
        }
        next();
    },
}