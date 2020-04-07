import AdminDashboard from './components/backend/AdminDashboard';
import CategoryList from './components/backend/category/List';
import AddCategory from './components/backend/category/New';
import EditCategory from './components/backend/category/Edit';
import PostList from './components/backend/post/List';

export const routes = [
    {
        path:'/admin',
        component: AdminDashboard
    },
    {
        path:'/category-list',
        component: CategoryList
    },
    {
        path:'/add-category',
        component: AddCategory
    },
    {
        path:'/edit-category/:id',
        component: EditCategory
    },
    {
        path:'/post-list',
        component: PostList
    },
]