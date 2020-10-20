import adminhomec  from './components/admin/AdminHome.vue';
import categorylist  from './components/admin/category/index.vue';
import AddCategory  from './components/admin/category/create.vue';
import EditCategory  from './components/admin/category/edit.vue';

export const routes = [
    {
        path:'/home',
        component:adminhomec
    },
    {
        path:'/admin/categories',
        component:categorylist
    }
    ,
    {
        path:'/admin/category/create',
        component:AddCategory
    }
    ,{
        path:'/admin/category/edit/:id',
        component:EditCategory
    }



]
