<template lang="">
    <div>
        <section id="page-title" class="page-title-classic">
            <div class="container">
                <div class="page-title">
                    <h1>จัดการภาพสไลด์</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">หน้าแรก</a>
                        </li>
                        <li><a>จัดการภาพสไลด์</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="d-flex justify-content-between">
                            <h4>จัดการภาพสไลด์</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"
                                >เพิ่มรูปภาพ</label
                            >
                            <input
                                type="file"
                                class="form-control"
                                multiple
                                accept="image/*"
                                id="upload-img"
                                @change="changImage"
                            />
                        </div>
                        <div class="row">
                            <div class="col p-3">
                                <div
                                    class="card"
                                    v-for="showImage in showImages"
                                >
                                    <div class="card-body">
                                        <img
                                            class="img-fluid"
                                            :src="'storage/' + showImage.url"
                                            alt=""
                                        />
                                    </div>
                                    <div class="card-footer">
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            @click="delSlide(showImage.id)"
                                        >
                                            ลบ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            @click="uploadSlide"
                            class="btn btn-primary"
                        >
                            บันทึก
                        </button>
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
            showImages: [],
            images: [],
            formImg: new FormData()
        };
    },
    mounted() {
        this.getImageSlide();
    },
    methods: {
        changImage(e) {
            this.images = [];
            let selectedFiles = e.target.files;
            if (!selectedFiles.length) {
                return false;
            }

            for (let i = 0; i < selectedFiles.length; i++) {
                let convert_KB = selectedFiles[i].size / Math.pow(1024, 2);
                if (convert_KB > 50) {
                    this.$swal.fire(
                        "ไม่สำเร็จ!",
                        "ไฟล์ขนาดใหญ่เกินไป (สูงสุด 50 MB!)",
                        "error"
                    );
                    e.target.files = null;
                    this.selectedFiles = null;
                    break;
                }
                this.images.push(selectedFiles[i]);
            }
        },
        uploadSlide() {
            for (let i = 0; i < this.images.length; i++) {
                this.formImg.append("images[]", this.images[i]);
            }
            const config = {
                headers: { "Content-Type": "multipart/form-data" }
            };
            document.getElementById("upload-img").value = [];
            axios
                .post(`api/upload-slide`, this.formImg, config)
                .then(response => {
                    this.$swal
                        .fire({
                            position: "center-center",
                            icon: "success",
                            title: "สำเร็จ",
                            showConfirmButton: false,
                            timer: 1000
                        })
                        this.getImageSlide();
                })
                .catch(err => {
                    this.$swal.fire({
                        position: "center-center",
                        icon: "error",
                        title: "ไม่สำเร็จ",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    console.log(err.response);
                });
        },
        delSlide(id) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบรูปนี้จริง ๆ หรือไม่ ?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: `ตกลง`,
                    cancelButtonText: `ยกเลิก`
                })
                .then(result => {
                    if (result.isConfirmed) {
                        axios.get(`api/del-one-image/${id}`).then(res => {
                            this.$swal.fire({
                                position: "center-center",
                                icon: "success",
                                title: "สำเร็จ",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            this.getImageSlide();
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
        getImageSlide() {
            axios.get("api/get-img-slide").then(res => {
                this.showImages = res.data;
                console.log(res.data);
            });
        }
    }
};
</script>
<style lang=""></style>
