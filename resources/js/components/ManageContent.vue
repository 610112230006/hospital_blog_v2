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
                            <div>
                                <h4>ข่าวสารทั้งหมดของคุณ</h4>
                            </div>
                            <a href="content-create" class="btn btn-primary">
                                เพิ่มข่าวสาร
                            </a>
                        </div>
                        <div class="input-group" v-if="status == 'admin'">
                            <span class="input-group-btn">
                                <button
                                    @click="searchAll"
                                    id="widget-subscribe-submit-button"
                                    class="btn btn-primary"
                                >
                                    <i class="fa fa-search"></i>
                                    ค้นหา
                                </button>
                            </span>
                            <input
                                type="text"
                                v-model="wordSearch"
                                required=""
                                name="widget-subscribe-form-email"
                                class="form-control required email"
                                placeholder=""
                            />
                        </div>
                        <div class="input-group" v-if="status == 'user'">
                            <span class="input-group-btn">
                                <button
                                    @click="searchByUser"
                                    id="widget-subscribe-submit-button"
                                    class="btn btn-primary"
                                >
                                    <i class="fa fa-search"></i>
                                    ค้นหา
                                </button>
                            </span>
                            <input
                                type="text"
                                v-model="wordSearch"
                                required=""
                                name="widget-subscribe-form-email"
                                class="form-control required email"
                                placeholder=""
                            />
                        </div>
                        <div
                            class="card mb-3"
                            v-for="showContent in showContents"
                        >
                            <div class="row p-3 no-gutters">
                                <div class="col-md-4 align-self-center">
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
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        showContent.id
                                                "
                                                >{{ showContent.title }}
                                            </a>
                                        </h2>
                                        <!--<p class="card-text">
                                        </p>-->
                                        <p class="card-text">
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        showContent.id
                                                "
                                                class="item-link"
                                                >อ่านต่อ...
                                                <i
                                                    class="icon-chevron-right"
                                                ></i
                                            ></a>
                                            <br />
                                            <span class="post-meta-date">
                                                <i class="icon-clock"></i
                                                >{{
                                                    `${showContent.time_show}, `
                                                }}</span
                                            >
                                            <span class="post-meta-date">
                                                <i class="icon-user"></i
                                                >ผู้เขียน
                                                {{
                                                    `${showContent.f_name} ${showContent.l_name}, `
                                                }}</span
                                            >
                                            <span
                                                v-for="statistic in statistics"
                                                v-if="
                                                    statistic.id_content ==
                                                        showContent.id
                                                "
                                                class="post-meta-date"
                                            >
                                                <i class="icon-eye"></i>เข้าชม
                                                {{ statistic.number_preview }}
                                                ครั้ง</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
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
            showImages: [],
            statistics: [],
            wordSearch:'',
            status: '',
            id_user:'',
        };
    },
    mounted() {
        axios
            .get("api/get-statistic-all")
            .then(res => {
                this.statistics = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
        axios.get("/auth-user").then(res => {
            console.log(res.data);
            if (res.data.type == "admin") {
                this.getContentAll();
                this.getAllImage();
                this.status = 'admin';
            } else {
                this.getContentByUser(res.data.id);
                this.getImageByUser(res.data.id);
                this.id_user = res.data.id
                this.status = 'user';
            }
        });
    },
    methods: {
        searchAll(){
             axios
            .post("api/search-content-by-admin", { search: this.wordSearch })
            .then(res => {                
                this.showContents = res.data;
            });
        },
        searchByUser(){
            axios
            .post("api/search-content-by-user", { search: this.wordSearch ,id_user: this.id_user})
            .then(res => {                
                this.showContents = res.data;
            });
        },
        // toDetailContent(id_content) {
        //     let route =
        //         '{{ url("detail-content", ["id_content" => "?anytagtoreplace?"]) }}';
        //     location.href = route.replace("?anytagtoreplace?", id_content);
        // },
        // permiss Admin
        getContentAll() {
            axios.get("api/content-all-by-create").then(res => {
                console.log(res.data);
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
