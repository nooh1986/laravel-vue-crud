<template>
    <br><br>

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <router-link to="/create" class="btn ripple btn-primary">Add Employee</router-link>
                    </div>
                    <br>

                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="employee in employees" :key='employee.id'>
                                    <td>{{ employee.id }}</td>
                                    <td>{{ employee.name }}</td>
                                    <td>{{ employee.email }}</td>
                                    <td>{{ employee.age }}</td>
                                    <td>
                                        <router-link :to="{ name: 'EmployeeEdit' , params: {id: employee.id }}" class="btn btn-sm btn-info"><i class="las la-pen"></i></router-link>
                                        <button @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">
                                            <i class="las la-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>       
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</template>


<script>
    import { ref , onMounted } from '@vue/runtime-core'
    import axios from 'axios'
    
    export default({

        setup() {
            let employees = ref([])
            
            onMounted(async() => {
                let response = await axios.get('/api/employee')
                employees.value = response.data.data;
            }) 
            
            const deleteEmployee = async (id) => {
                await axios.delete('/api/employee/' + id)
                if(!window.confirm('Are you sure')){
                    return
                }
                let i = employees.value.map(item => item.id).indexOf(id); 
                employees.value.splice(i, 1)
            }

            return { employees , deleteEmployee }
        },
    })

</script>
 