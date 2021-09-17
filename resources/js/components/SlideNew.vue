<template lang="">
    <div
        class="theiaStickySidebar"
        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"
    >
        <div class="widget widget-newsletter">
            <form class="widget-subscribe-form">
                <h4 class="widget-title">ค้นหาข่าวสาร</h4>
                <small>กรอกชื่อเรื่องข่าวสารที่ต้องการค้นหา</small>
                <div class="input-group">
                    <input
                        type="email"
                        v-model="search"
                        name="widget-subscribe-form-email"
                        class="form-control required email"
                    />
                    <span class="input-group-btn">
                        <button
                            type="button"
                            @click="searchForm"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="widget  widget-tags">
            <h4 class="widget-title">Tags</h4>
            <div class="tags">
                <a href="content-by-cate?id_cate=1">งานกฏหมาย</a>
                <a href="content-by-cate?id_cate=2">งานวินัย/ละเมิด</a>
                <a href="content-by-cate?id_cate=3">งานคุ้มครองจริยธรรม</a>
                <a href="content-by-cate?id_cate=4">ร้องเรียน/ร้องทุกข์</a>
                <a href="content-by-subcate?id_subcate=5">อำนาจหน้าที่</a>
                <a href="content-by-subcate?id_subcate=6">วิสัยทัศณ์</a>
                <a href="content-by-subcate?id_subcate=52">ITA</a>
                <a href="contact">ติดต่อเรา</a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            search: ""
        };
    },
    methods: {
        searchForm() {
            window.location.href = `search-content?word=${this.search}`;
            // axios.post('api/search-content',{search: this.search}).then((res)=>{
            // console.log(res.data)

            // })
        }
    }
};
</script>
<style lang=""></style>
