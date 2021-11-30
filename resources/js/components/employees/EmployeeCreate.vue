<template>
    <br><br>

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="storeEmployee">
                                    
                        <div class="col-6 offset-3">
                            <label>Name:</label>
                            <input type="text" v-model="form.name" class="form-control">
                        </div>
                        <br>

                        <div class="col-6 offset-3">
                            <label>Email:</label>
                            <input type="email" v-model="form.email" class="form-control">
                        </div>
                        <br>

                        <div class="col-6 offset-3">
                            <label>Age:</label>
                            <input type="number" v-model="form.age" class="form-control">
                        </div>
                        <br>               
                                                        
                        <button class="btn ripple btn-primary" type="submit">Save</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>    
</template>


<script>
    import { reactive } from '@vue/reactivity'
    import { useRouter } from 'vue-router';
    import axios from 'axios'
       

    export default({
        setup() {
            const form = reactive({
                name :'',
                email:'', 
                age  :''
            })
                      
            const router = useRouter()

            const storeEmployee = async() => {
                await axios.post('/api/employee' , form)
                await router.push({name: 'EmployeeIndex'}) 
            }

            return { form , storeEmployee}
        }
    })
</script>
