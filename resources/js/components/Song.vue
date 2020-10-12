<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <songs></songs>
            </div>
        </div>
    </div>
</template>

<script>
    import Index from './songs/Index';

    export default {
        components:{
            "songs":Index
        }  
    }
</script>
