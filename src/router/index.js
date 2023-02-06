import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import NotFound from '../components/NotFound.vue'
import Login_user from '../views/contents/User/Login_user.vue'
import RegisterUser from '../views/contents/User/Register-user.vue'
import Authors from '../views/contents/Authors/Authors.vue'
import AuthorShow from '../views/contents/Authors/Authors-show.vue'
import Books from '../views/contents/Books/Books.vue'
import BooksShow from '../views/contents/Books/BooksShow.vue'
import Customers from '../views/contents/Customers/Customers.vue'
import Genres from '../views/contents/Genres/Genres.vue'
import Suppliers from '../views/contents/Suppliers/Suppliers.vue'

import AuthorCreate from '../views/contents/Authors/Authors-form.vue'
import BooksCreate from '../views/contents/Books/Books-form.vue'
import CustomersCreate from '../views/contents/Customers/Customers-form.vue'
import GenresCreate from '../views/contents/Genres/Genres-form.vue'
import SuppliersCreate from '../views/contents/Suppliers/Suppliers-form.vue'




const routes = [{
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/login',
        name: 'login',
        component: Login_user
    },
    {
        path: '/*',
        name: 'notfound',
        component: NotFound
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterUser
    },
    {
        path: '/authors',
        name: 'authors',
        component: Authors
    },
    {
        path: '/authors/:id',
        name: 'authorShow',
        component: AuthorShow
    },
    {
        path: '/authors/create',
        name: 'authorCreate',
        component: AuthorCreate
    },
    {
        path: '/books',
        name: 'books',
        component: Books
    },
    {
        path: '/books/:id',
        name: 'booksShow',
        component: BooksShow
    },
    {
        path: '/books/create',
        name: 'booksCreate',
        component: BooksCreate
    },
    {
        path: '/customers',
        name: 'customers',
        component: Customers
    },
    {
        path: '/customers/create',
        name: 'customersCreate',
        component: CustomersCreate
    },
    {
        path: '/genres',
        name: 'genres',
        component: Genres
    },
    {
        path: '/genres/create',
        name: 'genresCreate',
        component: GenresCreate
    },
    {
        path: '/suppliers',
        name: 'suppliers',
        component: Suppliers
    },
    {
        path: '/suppliers/create',
        name: 'suppliersCreate',
        component: SuppliersCreate
    },
    {
        path: '/logout',
        name: 'logout',
        redirect: Login_user
    },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})


router.beforeEach((to, from, next) => {
    localStorage.setItem("route", to.name)
    next()
})

export default router