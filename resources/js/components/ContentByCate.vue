<!--<div v-for="content in contents" class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    content.id_content
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
                                                    v-for="(image,
                                                    index) in images"
                                                    :key="index"
                                                    v-if="
                                                        content.id_content ==
                                                            image.id_content
                                                    "
                                                >
                                                    <img
                                                        alt=""
                                                        class="img-fluid"
                                                        width="200"
                                                        height="50"
                                                        :src="
                                                            'storage/' +
                                                                image.url
                                                        "
                                                    />
                                                </slide>
                                            </carousel>
                                        </a>
                                    </div>
                                    <div class="post-item-description">
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
                                        <h2>
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        content.id_content
                                                "
                                                >{{ content.title }}
                                            </a>
                                        </h2>

                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    content.id
                                            "
                                            class="item-link"
                                            >อ่านต่อ...
                                            <i class="icon-chevron-right"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>-->
<template lang="">
    <section id="page-content" class="sidebar-right" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <!-- post content -->
                <div class="content col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <h1>{{category.name}}</h1>
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
                    <!-- Blog -->
                    <div id="blog" class="post-thumbnails">
                        <div v-for="content in contents" class="post-item">
                            <div class="post-item-wrap">
                                <div class="post-image">
                                    <a
                                        :href="
                                            '/detail-content?id_content=' +
                                                content.id_content
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
                                                v-for="(image, index) in images"
                                                :key="index"
                                                v-if="
                                                    content.id_content ==
                                                        image.id_content
                                                "
                                            >
                                                <img
                                                    alt=""
                                                    class="img-fluid"
                                                    width="200"
                                                    height="50"
                                                    :src="
                                                        'storage/' + image.url
                                                    "
                                                />
                                            </slide>
                                        </carousel>
                                    </a>
                                </div>
                                <div class="post-item-description">
                                    <span class="post-meta-date">
                                        <i class="icon-clock"></i
                                        >{{ `${content.time_show}, ` }}</span
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
                                    <h2>
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    content.id_content
                                            "
                                            >{{ content.title }}
                                        </a>
                                    </h2>

                                    <a
                                        :href="
                                            '/detail-content?id_content=' +
                                                content.id
                                        "
                                        class="item-link"
                                        >อ่านต่อ...
                                        <i class="icon-chevron-right"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Blog -->
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
</template>
<script>
export default {
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
<style lang=""></style>
