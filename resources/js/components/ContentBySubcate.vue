<template lang="">
    <div>
        <section
            v-if="typeSubcate == 'document'"
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
                            <h1>{{ subcate.name }}</h1>
                            <div class="breadcrumb float-left"></div>
                        </div>
                        <div v-for="content in contents" class="card">
                            <div class="card-header text-white bg-info">
                                <strong>
                                {{ content.title }}
                                </strong>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li
                                    v-for="docContent in docContents"
                                    v-if="
                                        docContent.id_content ==
                                            content.id_content
                                    "
                                    class="list-group-item"
                                >
                                    <div class="d-flex justify-content-between">
                                        <a
                                            href="javascript:void(0)"
                                            @click="dowloadFile(docContent.url)"
                                            >{{ docContent.name }}</a
                                        >
                                        <p>{{ docContent.created_at }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
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
        <section
            v-else
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
                            <h1>{{ subcate.name }}</h1>
                            <div class="breadcrumb float-left"></div>
                        </div>
                        <!-- end: Page title -->
                        <div
                            class="card mb-3 p-2"
                            v-for="content in contents"                            
                        >
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
                                                >{{ content.title }}
                                            </a>
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
    props: ["id_subcate"],
    data() {
        return {
            subcate: [],
            contents: [],
            images: [],
            docContents: [],
            typeSubcate: ""
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get(`api/get-one-subcate/${this.id_subcate}`)
                .then(res => {
                    this.subcate = res.data;
                    this.typeSubcate = res.data.type;
                })
                .catch(err => {
                    console.log(err.response.data);
                });
            axios
                .get(`api/subcate-by-subcate-orderby/${this.id_subcate}`)
                .then(res => {
                    this.contents = res.data;
                    console.log(this.contents);
                })
                .catch(err => {
                    console.log(err.response.data);
                });
            axios
                .get(`api/get-image-by-subcate/${this.id_subcate}`)
                .then(res => {
                    // this.category = res.data
                    this.images = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                });

            axios
                .get(`api/get-file-by-subcate/${this.id_subcate}`)
                .then(res => {
                    this.docContents = res.data;
                    console.log(this.docContents);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        dowloadFile: function(url) {
            window.open(`storage/${url}`);
        }
    }
};
</script>
