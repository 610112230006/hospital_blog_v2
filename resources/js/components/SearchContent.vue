<template lang="">
    <section id="page-content" class="sidebar-right" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <!-- post content -->
                <div class="content col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <h3>คำค้นหา</h3>
                        <div class="input-group">
                            <input
                                type="email"
                                v-model="search"
                                name="widget-subscribe-form-email"
                                class="form-control required email"
                            />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" @click="searchForm">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                     
                    </div>
                    <!-- end: Page title -->

                    <div class="card mb-3 p-2" v-for="content in contents">
                        <div class="row no-gutters">
                            <div class="col-md-4 align-self-center">
                                <carousel
                                    :perPage="1"
                                    :autoplay="true"
                                    :paginationEnabled="false"
                                    :autoplayHoverPause="true"
                                    :loop="true"
                                    :autoplayTimeout="3000"
                                >
                                    <slide
                                        v-for="(image, index) in images"
                                        :key="index"
                                        v-if="content.id == image.id_content"
                                    >
                                        <img
                                            alt=""
                                            class="img-thumbnail"
                                            width="100%"
                                            :src="'storage/' + image.url"
                                        />
                                    </slide>
                                </carousel>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    content.id
                                            "
                                            >{{ content.title }}</a
                                        >
                                    </h2>
                                    <p class="card-text">
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    content.id
                                            "
                                            class="item-link"
                                            >อ่านต่อ...
                                            <i class="icon-chevron-right"></i
                                        ></a>
                                    </p>
                                    <p class="card-text">
                                        <span class="post-meta-date">
                                            <i class="icon-clock"></i
                                            >{{
                                                `${content.time_show}, `
                                            }}</span
                                        >
                                        <span class="post-meta-date">
                                            <i class="icon-user"></i>ผู้เขียน
                                            {{
                                                `${content.f_name} ${content.l_name}, `
                                            }}</span
                                        >
                                        <span class="post-meta-date">
                                            <i class="icon-eye"></i>เข้าชม
                                            {{ content.number_preview }}
                                            ครั้ง</span
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->

                    <!-- end: Pagination -->
                </div>
                <!-- end: post content -->
                <!-- Sidebar-->
                <div
                    class="sidebar sticky-sidebar col-lg-3"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1004px;"
                ></div>
                <!-- end: Sidebar-->
            </div>
        </div>
    </section>
</template>
<script>
import SlideNew from "./SlideNew";
export default {
    props: ["wordsearch"],
    components: {
        "slidenew-component": SlideNew
    },
    data() {
        return {
            contents: [],
            images: [],
            search: this.wordsearch,
        };
    },
    mounted() {
        axios
            .post("api/search-content", { search: this.wordsearch })
            .then(res => {
                console.log(res.data);
                this.contents = res.data;
            });
        axios
            .get(`api/get-image-all`)
            .then(res => {
                console.log(res.data);
                this.images = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
    },
    methods: {
        searchForm(){
            window.location.href = `search-content?word=${this.search}`            
        }
    },

};
</script>
<style></style>
