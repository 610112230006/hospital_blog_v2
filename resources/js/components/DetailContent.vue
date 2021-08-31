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
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post single item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
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
                                                v-for="(image, index) in files"
                                                :key="index"
                                                v-if="image.type == 'image'"
                                            >
                                                <img
                                                    alt=""
                                                    class="img-fluid"
                                                    width="100%"
                                                    :src="
                                                        'storage/' + image.url
                                                    "
                                                />
                                            </slide>
                                        </carousel>
                                    </div>
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
                                                    `เขียนเมื่อ ${content.created_at}, `
                                                }}</span
                                            >
                                            <span class="post-meta-comments"
                                                ><i class="icon-user"></i>
                                                {{
                                                    `ผู้เขียน ${content.f_name} ${content.l_name}, `
                                                }}</span
                                            >
                                            <span class="post-meta-comments"
                                                ><i class="icon-eye"></i>
                                                {{
                                                    `เข้าชม ${statistic.number_preview} ครั้ง`
                                                }}</span
                                            >
                                        </div>
                                        <div v-html="content.detail"></div>
                                    </div>
                                    <h4>ดาวน์โหลดไฟล์</h4>
                                    <div class="post-tags">
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
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    props: ["id_content"],
    data() {
        return {
            content: {},
            files: [],
            checkAuth: false,
            statistic: []
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
                                        window.location.href = '/'
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
