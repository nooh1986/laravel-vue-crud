<template>

    <Side />

    <div class="main-content app-content">
        
        <Head />
        
        <div class="container-fluid">

            <router-view></router-view>
                         
        </div>    

    </div>    

    <Foot />
            
</template>

<script>

    import Side from './Side.vue'
    import Head from './Heade.vue'
    import Foot from './Foot.vue'

    export default {
        components: {
            Side , Head , Foot
        }
    }

</script>
