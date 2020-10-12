<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <upload></upload>
            </div>
        </div>
    </div>
</template>

<script>
    import Index from './upload/Index';

    export default {
        components:{
            "upload":Index
        }  
    }
</script>
