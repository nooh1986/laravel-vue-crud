import { createRouter, createWebHistory } from 'vue-router'

import Index from './../components/layouts/Index.vue'
import EmployeeIndex from './../components/employees/EmployeeIndex.vue'
import EmployeeCreate from './../components/employees/EmployeeCreate.vue'
import EmployeeEdit from './../components/employees/EmployeeEdit.vue'

const routes = [
 
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/index',
      name: 'EmployeeIndex',
      component: EmployeeIndex
    },
    {
      path: '/create',
      name: 'EmployeeCreate',
      component: EmployeeCreate
    },
    {
      path: '/edit/:id',
      name: 'EmployeeEdit',
      component: EmployeeEdit,
      props: true
    },    
]
  
const router = createRouter({
    history: createWebHistory(),
    routes
})
    
export default router;