<template lang="">
    <div>
        <section
            id="page-content"
            class="sidebar-right"
            style="transform: none;"
        >
            <div class="container" style="transform: none;">
                <div class="row" style="transform: none;">
                    <!-- content -->
                    <div class="content col-lg-9">
                        <span
                            v-for="(image, index) in files"
                            :key="index"
                            class="p-3"
                            v-if="image.type == 'image'"
                        >
                            <img
                                @click="showMultiple(image.url)"
                                alt=""
                                style="width:100%;max-width:300px"
                                class="img-thumbnail"
                                :src="'storage/' + image.url"
                            />
                        </span>

                        <!-- Blog -->
                        <div>
                            <!-- Post single item-->
                            <div>
                                <div>
                                    <div class="line"></div>
                                    <div class="post-item-description">
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <h2>{{ content.title }}</h2>
                                            <div v-if="checkAuth">
                                                <a
                                                    :href="
                                                        `edit-content?id_content=${content.id}`
                                                    "
                                                    type="button"
                                                    class="btn btn-primary"
                                                >
                                                    อัพเดท
                                                </a>
                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    @click="
                                                        delContent(content.id)
                                                    "
                                                >
                                                    ลบ
                                                </button>
                                            </div>
                                        </div>
                                        <div class="post-meta">
                                            <span class="post-meta-date"
                                                ><i class="icon-clock"></i
                                                >{{
                                                    `เขียนเมื่อ ${content.time_show}, `
                                                }}</span
                                            >
                                            <span class="post-meta-comments"
                                                ><i class="icon-user"></i>
                                                {{
                                                    `ผู้เขียน ${content.f_name}, `
                                                }}</span
                                            >
                                            <span class="post-meta-comments"
                                                ><i class="icon-eye"></i>
                                                {{
                                                    `เข้าชม ${statistic.number_preview} ครั้ง`
                                                }}</span
                                            >
                                        </div>
                                        <div class="line"></div>
                                        <div v-html="content.detail"></div>
                                    </div>
                                    <div class="line"></div>
                                    <h4>ดาวน์โหลดไฟล์</h4>
                                    <div class="tags">
                                        <a
                                            href="javascript:void(0)"
                                            v-for="file in files"
                                            @click="dowloadFile(file.url)"
                                            v-if="file.type == 'file'"
                                            >{{ file.name }}</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <!-- end: Post single item-->
                        </div>
                    </div>
                    <!-- end: content -->
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
                <div>
                    <!-- all props & events -->
                    <vue-easy-lightbox
                        escDisabled
                        moveDisabled
                        :visible="visible"
                        :imgs="imgs"
                        :index="index"
                        @hide="handleHide"
                    ></vue-easy-lightbox>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import SlideNew from "./SlideNew";
import VueEasyLightbox from "vue-easy-lightbox";

export default {
    components: {
        "slidenew-component": SlideNew,
        VueEasyLightbox
    },
    props: ["id_content"],
    data() {
        return {
            content: {},
            files: [],
            checkAuth: false,
            statistic: [],
            imgs: "", // Img Url , string or Array of string
            visible: false,
            index: 0, // default: 0
            images: []
        };
    },

    mounted() {
        this.fetchData();
        axios.get(`api/push-statistic/${this.id_content}`).then(res => {});
        axios
            .get(`api/get-statistic-by-content/${this.id_content}`)
            .then(res => {
                this.statistic = res.data;
            });
    },
    methods: {
        showSingle() {
            this.imgs = "images/slider/slider1.JPG";
            // or
            this.imgs = {
                title: "this is a placeholder",
                src: "images/slider/slider1.JPG"
            };
            this.show();
        },
        showMultiple(url) {
            this.imgs = [
                `storage/${url}`
                // "http://via.placeholder.com/350x150"
            ];

            this.index = 1; // index of imgList
            this.show();
        },
        show() {
            this.visible = true;
        },
        handleHide() {
            this.visible = false;
        },

        fetchData() {
            axios.get(`api/get-content-by-id/${this.id_content}`).then(res => {
                let content = res.data[0];
                this.content = res.data[0];
                axios.get("auth-user").then(res => {
                    if (res.data.id == null) {
                        this.checkAuth = false;
                    } else {
                        if (res.data.type == "admin") {
                            this.checkAuth = true;
                        } else if (res.data.type == "user") {
                            if (content.user_id == res.data.id) {
                                this.checkAuth = true;
                            } else {
                                this.checkAuth = false;
                            }
                        }
                    }
                });
            });
            axios
                .get(`api/get-image-by-idContent/${this.id_content}`)
                .then(res => {
                    this.files = res.data;
                });
        },
        delContent(id_content) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบ ข่าวสารนี้จริง ๆ หรือไม่?",
                    text: "ข้อมูลข่าวสารที่โพสข้อมูลไม่สามารถกู้คืนได้ !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "ยกเลิก",
                    confirmButtonText: "ตกลง"
                })
                .then(result => {
                    if (result.isConfirmed) {
                        axios
                            .get(`delete-content/${id_content}`)
                            .then(res => {
                                this.$swal
                                    .fire({
                                        position: "center-center",
                                        icon: "success",
                                        title: "สำเร็จ",
                                        showConfirmButton: false,
                                        timer: 1000
                                    })
                                    .then(() => {
                                        window.location.href = "/";
                                        // this.fetchData();
                                    });
                            })
                            .catch(err => {
                                console.log(err);
                                this.$swal.fire(
                                    "ไม่สำเร็จ!",
                                    "การลบไม่สำเร็จ.",
                                    "error"
                                );
                            });
                    } else {
                        this.$swal.fire({
                            position: "center-center",
                            icon: "info",
                            title: "ยกเลิก",
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                });
        },
        dowloadFile(id) {
            window.open(`storage/${id}`);
        }
    }
};
</script>
<style lang=""></style>
