import AdminDashboard from './components/backend/AdminDashboard';
import AdminPost from './components/backend/AdminPost';
import CategoryList from './components/backend/category/List';
import AddCategory from './components/backend/category/New';
import EditCategory from './components/backend/category/Edit';

export const routes = [
    {
        path:'/admin',
        component: AdminDashboard
    },
    {
        path:'/post',
        component: AdminPost
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
]