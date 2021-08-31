<template lang="">
    <div>
        <div>
            <section id="page-title" class="page-title-classic">
                <div class="container">
                    <div class="page-title">
                        <h1>อัพเดทข่าวสาร</h1>

                        <!-- <span>Inspiration comes of working every day.</span> -->
                    </div>
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="/">หน้าแรก</a>
                            </li>
                            <li><a>อัพเดทข่าวสาร</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="page-content">
                <div class="container">
                    <div class="row">
                        <div class="content col-lg-9">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"
                                        >หัวเรื่อง</label
                                    >
                                    <input
                                        v-model="content.title"
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        :class="{ 'is-invalid': error.title }"
                                    />
                                    <div v-if="error.title" class="is-invalid">
                                        {{ error.title[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"
                                        >หมวดหมู่</label
                                    >
                                    <select
                                        v-if="permissCate == 'cate'"
                                        class="form-select"
                                        :class="{ 'is-invalid': error.type }"
                                        v-model="content.type"
                                    >
                                        <optgroup
                                            v-for="optionCate in optionCates"
                                            :label="optionCate.name"
                                        >
                                            <option
                                                v-for="optionSubCate in optionSubCates"
                                                v-if="
                                                    optionSubCate.category_id ==
                                                        optionCate.id
                                                "
                                                :value="optionSubCate.id"
                                            >
                                                {{ optionSubCate.name }}
                                            </option>
                                        </optgroup>
                                    </select>

                                    <select
                                        v-if="permissCate == 'subCate'"
                                        class="form-select"
                                        v-model="content.type"
                                        :class="{ 'is-invalid': error.type }"
                                    >
                                        <option
                                            v-for="(optionSubCate,
                                            index) in optionSubCates"
                                            :key="index"
                                            :value="optionSubCate.id"
                                            >{{ optionSubCate.name }}</option
                                        >
                                    </select>
                                    <div v-if="error.type" class="is-invalid">
                                        {{ error.type[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"
                                        >เพิ่มรูปภาพ</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        multiple
                                        accept="image/jpeg"
                                        id="upload-img"
                                        @change="changImage"
                                    />
                                    <div class="row">
                                        <div
                                            class="col-md-3 p-3"
                                            v-for="showImage in showImages"
                                        >
                                            <div class="card">
                                                <div class="card-body">
                                                    <img
                                                        :src="
                                                            'storage/' +
                                                                showImage.url
                                                        "
                                                        class="img-fluid"
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="card-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        @click="
                                                            DelOneImage(
                                                                showImage.id
                                                            )
                                                        "
                                                    >
                                                        ลบ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div v-for="(image, key) in images" :key="key">
                                    <img
                                        :src="image.src"
                                        class="preview"
                                        style="width:200px;"
                                    />
                                    {{ image.file.name }}
                                </div> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">
                                        <div
                                            class="d-flex justify-content-between"
                                        >
                                            <p>
                                                เพิ่มไฟล์
                                            </p>
                                            <p class="text-danger">
                                                *ขนาดของไฟล์ใหม่: 20เมกะไบต์
                                            </p>
                                        </div>
                                    </label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        multiple
                                        id="upload-file"
                                        @change="changFile"
                                        accept=".doc,.docx,.zip,.xlsx,.xls,.pdf,.xls,.pptx,.ppt,.txt"
                                    />
                                    <div
                                        v-if="errorFile.file"
                                        class="is-invalid"
                                    >
                                        {{ errorFile.file }}
                                    </div>
                                    <div class="row mt-2">
                                        <div
                                            v-for="showFile in showFiles"
                                            class="col-xs-1-12"
                                        >
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex justify-content-between"
                                                    >
                                                        <div>
                                                            {{ showFile.name }}
                                                        </div>
                                                        <a
                                                            href="javascript:void(0)"
                                                            @click="
                                                                DelOneFile(
                                                                    showFile.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-window-close"
                                                            ></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">รายระเอียด</label>
                                    <textarea
                                        name="detail"
                                        class="form-control"
                                        :class="{ 'is-invalid': error.type }"
                                    ></textarea>
                                    <div v-if="error.detail" class="is-invalid">
                                        {{ error.detail[0] }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="example-date-input"
                                        class="col-2 col-form-label"
                                        >เผยแพร่วันที่</label
                                    >
                                    <div class="col-10">
                                        <input
                                            class="form-control"
                                            type="date"
                                            v-model="content.time_show"
                                            value=""
                                            id="example-date-input"
                                        />
                                    </div>
                                </div>

                                <button
                                    @click.prevent="uploadContent"
                                    class="btn btn-primary"
                                >
                                    อัพเดทข่าวสาร
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
export default {
    props: ["id_content"],
    data() {
        return {
            showAllTime: true,
            content: [],
            optionCates: [],
            optionSubCates: [],
            formImg: new FormData(),
            formFile: new FormData(),
            images: [],
            files: [],
            error: [],
            errorFile: [],
            showImages: [],
            showFiles: [],
            errImage: "",
            permissCate: ""
        };
    },
    mounted() {
        CKEDITOR.replace("detail");
        this.fetchData();
        axios.get("auth-user").then(res => {
            if (res.data.category_id == "0") {
                this.permissCate = "cate";
                axios.get("api/category").then(res => {
                    this.optionCates = res.data;
                });
                axios.get("api/sub-category").then(res => {
                    this.optionSubCates = res.data;
                });
            } else {
                this.permissCate = "subCate";
                axios
                    .get(`api/subcate-by-cate/${res.data.category_id}`)
                    .then(res => {
                        this.optionSubCates = res.data;
                    })
                    .catch(err => console.log(err.response));
            }
        });
    },
    methods: {
        DelOneImage(id) {
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
                            this.fetchData();
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
        DelOneFile(id) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบไฟล์นี้จริง ๆ หรือไม่ ?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: `ตกลง`,
                    cancelButtonText: `ยกเลิก`
                })
                .then(result => {
                    if (result.isConfirmed) {
                        axios.get(`api/del-one-file/${id}`).then(res => {
                            this.$swal.fire({
                                position: "center-center",
                                icon: "success",
                                title: "สำเร็จ",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            this.fetchData();
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
        fetchData() {
            this.showImages = [];
            this.showFiles = [];
            axios.get(`api/get-content-by-id/${this.id_content}`).then(res => {
                let data = res.data[0];

                this.content = {
                    title: data.title,
                    type: data.type,
                    detail: CKEDITOR.instances.detail.setData(data.detail),
                    time_show: data.time_show
                };
                console.log(res.data);
            });
            axios
                .get(`api/get-image-by-idContent/${this.id_content}`)
                .then(res => {
                    res.data.forEach((item, index) => {
                        if (item.type == "image") {
                            this.showImages.push(item);
                        } else if (item.type == "file") {
                            this.showFiles.push(item);
                        }
                    });
                    console.log(this.showImages);
                    console.log(this.showFiles);
                });
        },
        changImage(e) {
            this.images = [];
            let selectedFiles = e.target.files;
            if (!selectedFiles.length) {
                return false;
            }

            for (let i = 0; i < selectedFiles.length; i++) {
                let convert_KB = selectedFiles[i].size / Math.pow(1024, 2);
                if (convert_KB > 20) {
                    this.$swal.fire(
                        "ไม่สำเร็จ!",
                        "ไฟล์ขนาดใหญ่เกินไป (สูงสุด 20 MB!)",
                        "error"
                    );
                    e.target.files = null;
                    this.selectedFiles = null;
                    break;
                }
                this.images.push(selectedFiles[i]);
            }
        },
        changFile(e) {
            this.files = [];
            let selectedFiles = e.target.files;
            if (!selectedFiles.length) {
                return false;
            }
            for (let i = 0; i < selectedFiles.length; i++) {
                let convert_KB = selectedFiles[i].size / Math.pow(1024, 2);
                if (convert_KB > 20) {
                    this.$swal.fire(
                        "ไม่สำเร็จ!",
                        "ไฟล์ขนาดใหญ่เกินไป (สูงสุด 20 MB!)",
                        "error"
                    );
                    e.target.files = null;
                    this.selectedFiles = null;
                    break;
                }
                this.files.push(selectedFiles[i]);
            }
        },
        uploadContent() {
            this.error = [];

            let data = {
                title: this.content.title,
                type: this.content.type,
                time_show: this.content.time_show,
                detail: CKEDITOR.instances.detail.getData()
            };
            if (this.images.length == 0 && this.showImages.length == 0) {
                this.$swal.fire("ไม่สำเร็จ!", "กรุณาเลือกรูปภาพ", "error");
            } else {
                axios
                    .post(`update-content/${this.id_content}`, data)
                    .then(res => {
                        console.log(res.data);
                        const id_content = res.data.id;

                        for (let i = 0; i < this.images.length; i++) {
                            this.formImg.append("images[]", this.images[i]);
                        }
                        const config = {
                            headers: { "Content-Type": "multipart/form-data" }
                        };
                        document.getElementById("upload-img").value = [];
                        axios
                            .post(
                                `api/upload-image?content_id=${id_content}`,
                                this.formImg,
                                config
                            )
                            .then(response => {
                                for (let i = 0; i < this.files.length; i++) {
                                    this.formFile.append(
                                        "file[]",
                                        this.files[i]
                                    );
                                }
                                const config = {
                                    headers: {
                                        "Content-Type": "multipart/form-data"
                                    }
                                };
                                document.getElementById(
                                    "upload-file"
                                ).value = [];
                                axios
                                    .post(
                                        `api/upload-file?content_id=${id_content}`,
                                        this.formFile,
                                        config
                                    )
                                    .then(response => {
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
                                            });
                                    })
                                    .catch(error => {
                                        this.errorFile =
                                            error.response.data.error;
                                        console.log(error.response);
                                    });
                            })
                            .catch(err => {
                                console.log(err.response);
                            });
                    })
                    .catch(error => {
                        this.error = error.response.data.errors;
                        console.log(error.response);
                    });
            }
        }
    }
};
</script>
<style lang=""></style>
