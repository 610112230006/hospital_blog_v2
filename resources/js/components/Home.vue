<template lang="">
    <div>
        <section
            id="page-content"
            class="sidebar-right"
            style="transform: none;"
        >
            <div class="container" style="transform: none;">
                <div class="row" style="transform: none;">
                    <!-- post content -->
                    <div class="content col-lg-9">
                        <!-- Page title -->
                        <div class="page-title mb-5">
                            <h1>ข่าวประชาสัมพันธ์ (ล่าสุด)</h1>
                        </div>
                        <!-- end: Page title -->
                        <!-- Blog -->
                        <div id="blog" class="post-thumbnails">
                            <!-- Post item-->
                            <div
                                class="post-item"
                                v-for="newContent in newContents"
                            >
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    newContent.id
                                            "
                                        >
                                            <carousel
                                                :perPage="1"
                                                :autoplay="true"
                                                :paginationEnabled="false"
                                                :navigationEnabled="true"
                                                :autoplayHoverPause="true"
                                                :loop="true"
                                                :autoplayTimeout="3000"
                                            >
                                                <slide
                                                    v-for="(newImgContent,
                                                    index) in newImgContents"
                                                    :key="index"
                                                    v-if="
                                                        newContent.id ==
                                                            newImgContent.id_content
                                                    "
                                                >
                                                    <img
                                                        alt=""
                                                        class="img-fluid"
                                                        width="200"
                                                        height= "50"
                                                        :src="
                                                            'storage/' +
                                                                newImgContent.url
                                                        "
                                                    />
                                                </slide>
                                            </carousel>
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        
                                        <h2>
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        newContent.id
                                                "
                                                >{{ newContent.title }}
                                            </a>
                                        </h2>

                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    newContent.id
                                            "
                                            class="item-link"
                                            >อ่านต่อ...
                                            <i class="icon-chevron-right"></i
                                        ></a>
                                        <br>
                                        <span class="post-meta-date">
                                            <i class="icon-clock"></i
                                            >{{
                                                `${newContent.time_show}, `
                                            }}</span
                                        >
                                        <span class="post-meta-date">
                                            <i class="icon-user"></i>ผู้เขียน
                                            {{
                                                `${newContent.f_name} ${newContent.l_name}, `
                                            }}</span
                                        >
                                        <span
                                            v-for="statistic in statistics"
                                            v-if="
                                                statistic.id_content ==
                                                    newContent.id
                                            "
                                            class="post-meta-date"
                                        >
                                            <i class="icon-eye"></i>เข้าชม
                                            {{ statistic.number_preview }}
                                            ครั้ง</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post item-->
                        </div>

                        <!-- end: Blog -->
                        <!-- Pagination -->
                    </div>
                    <!-- end: post content -->
                    <!-- Sidebar-->
                    <div
                        class="sidebar sticky-sidebar col-lg-3"
                        style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;"
                    >
                        <!--Tabs with Posts-->

                        <!--End: Tabs with Posts-->
                        <!-- Twitter widget -->

                        <!-- end: Twitter widget-->
                        <!--widget tags -->

                        <!--end: widget tags -->
                        <!--widget newsletter-->

                        <!--end: widget newsletter-->
                        <slidenew-component></slidenew-component>
                    </div>
                    <!-- end: Sidebar-->
                </div>
                <h1>การดำเนินงาน</h1>
                <carousel :perPage="4">
                    <slide class="p-3">
                        <div class="card">
                            <img class="card-img-top" src="" alt="" />
                            <div class="card-body">
                                <h4 class="card-title">ประกาศ</h4>
                                <p class="card-text">1</p>
                            </div>
                        </div>
                    </slide>
                    <slide class="p-3">
                        <div class="card">
                            <img class="card-img-top" src="" alt="" />
                            <div class="card-body">
                                <h4 class="card-title">รับสมัครงาน</h4>
                                <p class="card-text">2</p>
                            </div>
                        </div>
                    </slide>
                    <slide class="p-3">
                        <div class="card">
                            <img class="card-img-top" src="" alt="" />
                            <div class="card-body">
                                <h4 class="card-title">ประกาศ</h4>
                                <p class="card-text">3</p>
                            </div>
                        </div>
                    </slide>
                    <slide class="p-3">
                        <div class="card">
                            <img class="card-img-top" src="" alt="" />
                            <div class="card-body">
                                <h4 class="card-title">ประกาศ</h4>
                                <p class="card-text">4</p>
                            </div>
                        </div>
                    </slide>
                </carousel>
                <div class="row">
                    <div class="content col-lg-9">
                        <!-- Accordion -->
                        <h4>กฏหมายที่เกี่ยวข้อง</h4>
                        <div class="accordion">
                            <div class="ac-item">
                                <h5 class="ac-title">มอบหมายอำนาจ</h5>
                                <div class="ac-content container" style="display: none;">
                                    <p>เอกสารที่ 1</p>
                                    <p>เอกสารที่ 2</p>
                                    

                                </div>
                            </div>
                            <div class="ac-item">
                                <h5 class="ac-title">กฏหมายการแพทย์</h5>
                                <div class="ac-content" style="display: none;">
                                    <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary.</p>
                                    
                                </div>
                            </div>
                            <div class="ac-item">
                                <h5 class="ac-title">วินัย</h5>
                                <div class="ac-content" style="display: none;">
                                    <p>As it floats around us in an eternity of bliss; and then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress</p>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- end: Accordion -->
                        <div class="line"></div>
                        <!-- Accordion -->
                        
                        <!-- end: Accordion -->
                    </div>
                    <!-- Sidebar-->
                    
                    <!-- end: sidebar-->
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import SlideNew from './SlideNew'
export default {
    components: {
    'slidenew-component': SlideNew,

  },
    data() {
        return {
            newContents: [],
            newImgContents: [],
            statistics: []
        };
    },
   

    mounted() {
        axios.get("api/cont-new-home").then(res => {
            console.log(res.data);
            this.newContents = res.data;
        }).catch(err=>{
            console.log(err.response.data)
        });
        axios.get("api/get-all-image").then(res => {
            this.newImgContents = res.data;
        });
        axios.get("api/get-statistic-all").then(res => {
            this.statistics = res.data;
    
        }).catch((err)=>{
            console.log(err.response.data)
        });
    }
};
</script>
<style lang=""></style>
