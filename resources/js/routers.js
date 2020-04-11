import AdminDashboard from './components/backend/AdminDashboard';
import CategoryList from './components/backend/category/List';
import AddCategory from './components/backend/category/New';
import EditCategory from './components/backend/category/Edit';
import PostList from './components/backend/post/List';
import AddPost from './components/backend/post/New';
import EditPost from './components/backend/post/Edit';

export const routes = [
    {
        path:'/admin',
        component: AdminDashboard
    },
    //Category
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
    //Post
    {
        path:'/post-list',
        component: PostList
    },
    {
        path:'/add-post',
        component: AddPost  
    },
    {
        path:'/edit-post/:id',
        component: EditPost
    },
]