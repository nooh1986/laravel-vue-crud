<template>
    <br><br>

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="updateEmployee">
                                    
                        <div class="col-6 offset-3">
                            <label>Name:</label>
                            <input type="text" v-model="employee.name" class="form-control">
                        </div>
                        <br>

                        <div class="col-6 offset-3">
                            <label>Email:</label>
                            <input type="email" v-model="employee.email" class="form-control">
                        </div>
                        <br>

                        <div class="col-6 offset-3">
                            <label>Age:</label>
                            <input type="number" v-model="employee.age" class="form-control">
                        </div>
                        <br>               
                                                        
                        <button class="btn ripple btn-primary" type="submit">Update</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>    
</template>


<script>
    import axios from "axios"
    import { useRoute , useRouter } from 'vue-router';
    import { ref , onMounted } from '@vue/runtime-core';
    

    export default({

        props: ['id'],

        setup() {
            const employee = ref([])
            
            const route = useRoute();
            const router = useRouter();
            
            onMounted(async() => {
                const response = await axios.get(`/api/employee/${route.params.id}/edit`) 
                employee.value = response.data.data;
            })

            const updateEmployee = async() => {
                await axios.put(`/api/employee/${route.params.id}` , employee.value)
                await router.push({name: 'EmployeeIndex'})
            }

            return { employee , updateEmployee}
        },
    })
</script>

