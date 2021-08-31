<template lang="">
    <div>
        <section id="page-title" class="page-title-classic">
            <div class="container">
                <div class="page-title">
                    <h1>จัดการข่าวสาร</h1>

                    <!-- <span>Inspiration comes of working every day.</span> -->
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">หน้าแรก</a>
                        </li>
                        <li><a>จัดการบัญชีผู้ใช้</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="d-flex justify-content-between">
                            <h4>ข่าวสารทั้งหมดของคุณ</h4>
                            <a href="user-create" class="btn btn-primary">
                                เพิ่มข่าวสาร
                            </a>
                        </div>
                        <div id="blog" class="post-thumbnails">
                            <!-- Post item-->
                            <div
                                class="post-item"
                                v-for="showContent in showContents"
                            >
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    showContent.id
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
                                                    v-for="(showImage,
                                                    index) in showImages"
                                                    :key="index"
                                                    v-if="
                                                        showContent.id ==
                                                            showImage.id_content
                                                    "
                                                >
                                                    <img
                                                        alt=""
                                                        class="img-fluid"
                                                        width="100%"
                                                        :src="
                                                            'storage/' +
                                                                showImage.url
                                                        "
                                                    />
                                                </slide>
                                            </carousel>
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                        <span class="post-meta-date"
                                            ><i class="fa fa-calendar-o"></i>{{
                                                showContent.time_show
                                            }}</span
                                        >
                                        <h2>
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        showContent.id
                                                "
                                                >{{ showContent.title }}
                                            </a>
                                        </h2>

                                        <a
                                            :href="
                                                '/detail-content?id_content=' +
                                                    showContent.id
                                            "
                                            class="item-link"
                                            >อ่านต่อ...
                                            <i class="icon-chevron-right"></i
                                        ></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post item-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showContents: [],
            showImages: []
        };
    },
    mounted() {
        axios.get("/auth-user").then(res => {
            console.log(res.data);
            if (res.data.type == "admin") {
                this.getContentAll();
                this.getAllImage();
            } else {
                this.getContentByUser(res.data.id);
                this.getImageByUser(res.data.id);
            }
        });
    },
    methods: {
        // toDetailContent(id_content) {
        //     let route =
        //         '{{ url("detail-content", ["id_content" => "?anytagtoreplace?"]) }}';
        //     location.href = route.replace("?anytagtoreplace?", id_content);
        // },
        // permiss Admin
        getContentAll() {
            axios.get("api/content-all-by-create").then(res => {
                this.showContents = res.data;
            });
        },
        getAllImage() {
            axios.get("api/get-all-image").then(res => {
                this.showImages = res.data;
            });
        },

        // permiss User
        getContentByUser(user_id) {
            axios.get(`api/content-by-user/${user_id}`).then(res => {
                this.showContents = res.data;
            });
        },
        getImageByUser(user_id) {
            axios
                .get(`api/get-image-by-user/${user_id}`)
                .then(res => {
                    console.log(res.data);
                    this.showImages = res.data;
                })
                .catch(err => {
                    console.log(error.response.data);
                });
        }
    }
};
</script>
<style lang=""></style>
