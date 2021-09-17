<template lang="">
    <div>
        <carousel
            :perPage="1"
            :loop="true"            
            :autoplay="true"            
            style="width:100%"
        >
            <slide v-for="slide in slides">
                <img
                    :src="'storage/'+slide.url"
                    width="100%"
                    class="img-fluid"
                    alt=""
                />
            </slide>
           
        </carousel>
    </div>
</template>
<script>
export default {
    data() {
        return {
            slides:[]
        }
    },
    mounted() {
        this.getImageSlide();
    },
    methods: {
        getImageSlide() {
            axios.get("api/get-img-slide").then(res => {
                this.slides = res.data;                
            });
        }
    },
};
</script>
<style lang=""></style>
