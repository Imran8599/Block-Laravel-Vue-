import AdminDashboard from './components/backend/AdminDashboard';
import AdminPost from './components/backend/AdminPost';
export const routes = [
    {
        path:'/admin',
        component: AdminDashboard
    },
    {
        path:'/post',
        component: AdminPost
    }
]