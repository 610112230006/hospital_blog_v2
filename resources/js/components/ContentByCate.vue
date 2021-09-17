<template lang="">
    <div>
        <section
            id="page-title"
            class="page-title-classic"
            style="background-image: url('images/parallax/law2.jpeg'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;"
        >
            <div class="container">
                <div class="page-title">
                    <h1 class="bonus text-white">
                        <b>{{ category.name }}</b>
                    </h1>

                    <!-- <span>Inspiration comes of working every day.</span> -->
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/"><b>หน้าแรก</b></a>
                        </li>
                        <li>
                            <a><b>{{ category.name }}</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
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
                        <div class="page-title">
                            <!--<h1>{{  }}</h1>-->
                            <div class="breadcrumb float-left">
                                <!--<ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li class="active">
                                    <a href="#">Sidebar Right</a>
                                </li>
                            </ul>-->
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
                                        :navigationEnabled="true"
                                        :autoplayHoverPause="true"
                                        :loop="true"
                                        :autoplayTimeout="3000"
                                    >
                                        <slide
                                            v-for="(image, index) in images"
                                            :key="index"
                                            v-if="
                                                content.id_content ==
                                                    image.id_content
                                            "
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
                                                        content.id_content
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
                                                <i
                                                    class="icon-chevron-right"
                                                ></i
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
                                                <i class="icon-user"></i
                                                >ผู้เขียน
                                                {{
                                                    `${content.f_name}, `
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
            </div>
        </section>
    </div>
</template>
<script>
import SlideNew from "./SlideNew";
export default {
    components: {
        "slidenew-component": SlideNew
    },
    props: ["id_cate"],
    data() {
        return {
            category: [],
            contents: [],
            images: []
        };
    },
    mounted() {
        axios
            .get(`api/get-one-cate/${this.id_cate}`)
            .then(res => {
                this.category = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
        axios
            .get(`api/subcate-by-cate-orderby/${this.id_cate}`)
            .then(res => {
                this.contents = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
        axios
            .get(`api/get-image-by-cate/${this.id_cate}`)
            .then(res => {
                this.images = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
    },
    method: {}
};
</script>
<style>
h1.bonus {
    text-shadow: 3px 3px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000,
        -1px 1px 0 #000, 1px 1px 0 #000;
}
</style>
