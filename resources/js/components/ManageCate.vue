<template>
    <div>
        <section id="page-title" class="page-title-classic">
            <div class="container">
                <div class="page-title">
                    <h1>จัดการหมวดหมู่</h1>

                    <!-- <span>Inspiration comes of working every day.</span> -->
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">หน้าแรก</a>
                        </li>
                        <li><a>จัดการหมวดหมู่</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-12">
                        <div class="d-flex justify-content-between">
                            <h4>หมวดหมู่</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div v-for="data in optionMainCate" :key="data.id">
                            <div class="card">
                                <div
                                    class="card-header d-flex justify-content-between"
                                    id="headingOne"
                                >
                                    <h5>{{ data.name }} {{data.id}}</h5>
                                    <h4>
                                        <a
                                            @click="delMainCate(data.id)"
                                            href="javascript:void(0)"
                                            >ลบ</a
                                        >
                                    </h4>
                                </div>

                                <div>
                                    <div class="card-body">
                                        <div
                                            v-for="data2 in optionSubCate"
                                            :key="data2.id"
                                            class="d-flex justify-content-between"
                                        >
                                            <p
                                                v-if="
                                                    data2.category_id == data.id
                                                "
                                            >
                                                {{ data2.name }}
                                                {{ data2.id }}
                                            </p>
                                            <a
                                                v-if="
                                                    data2.category_id == data.id
                                                "
                                                @click="delSubCate(data2.id)"
                                                href="javascript:void(0)"
                                                >ลบ</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">เพิ่มหมวดหมู่</h4>
                                <div class="card-text mt-2">
                                    <div class="form-group">
                                        <select
                                            class="form-select"
                                            id="exampleFormControlSelect1"
                                            v-model="selectCate"
                                            @change="setSelectCate"
                                        >
                                            <option value="main"
                                                >หมวดหมู่หลัก</option
                                            >
                                            <option value="sub"
                                                >หมวดหมู่ย่อย</option
                                            >
                                        </select>
                                    </div>
                                    <div
                                        v-if="statusSubcate"
                                        class="form-group"
                                    >
                                        <label for="exampleFormControlInput1"
                                            >ต้องการเพิ่มในหมวดหมู่ใด</label
                                        >
                                        <select
                                            class="form-select"
                                            id="exampleFormControlSelect1"
                                            v-model="selectMainCate"
                                        >
                                            <option
                                                v-for="data in optionMainCate"
                                                :key="data.id"
                                                v-bind:value="data.id"
                                                >{{ data.name }}</option
                                            >
                                        </select>
                                        <div
                                            v-if="errorsSelect.length"
                                            id="username-error"
                                            class="is-invalid"
                                        >
                                            {{ errorsSelect }}
                                        </div>
                                    </div>
                                    <div
                                        v-if="!statusSubcate"
                                        class="form-group"
                                    >
                                        <label for="exampleFormControlInput1"
                                            >ชื่อหมวดหมู่หลัก</label
                                        >
                                        <input
                                            v-model="nameMainCate"
                                            type="text"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                        />
                                        <div
                                            v-if="errorsCate.length"
                                            id="username-error"
                                            class="is-invalid"
                                        >
                                            {{ errorsCate }}
                                        </div>
                                    </div>
                                    <div v-else class="form-group">
                                        <label for="exampleFormControlInput1"
                                            >ชื่อหมวดหมู่ย่อย</label
                                        >
                                        <input
                                            v-model="nameSubCate"
                                            type="text"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                        />
                                        <div
                                            v-if="errors.length"
                                            id="username-error"
                                            class="is-invalid"
                                        >
                                            {{ errors }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div v-if="!statusSubcate">
                                            <button
                                                @click="addMainCate"
                                                class="btn btn-primary"
                                            >
                                                เพิ่มหมวดหมู่หลัก
                                            </button>
                                        </div>
                                        <div v-else>
                                            <button
                                                @click="addSubCate"
                                                class="btn btn-primary"
                                            >
                                                เพิ่มหมวดหมู่ย่อย
                                            </button>
                                        </div>
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
            selectCate: "main",
            optionMainCate: [],
            optionSubCate: [],
            selectMainCate: "",
            nameMainCate: "",
            nameSubCate: "",
            statusSubcate: false,
            errorsSelect: [],
            errors: [],
            errorsCate: []
        };
    },
    mounted() {
        this.fetchCategory();
        this.fetchSubCategory();
    },
    methods: {
        delMainCate(cate_id) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบหมวดหมู่หลักจริง ๆ หรือไม่ ?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: `ตกลง`,
                    cancelButtonText: `ยกเลิก`
                })
                .then(result => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .delete(`api/category/${cate_id}`)
                            .then(res => {
                                console.log(res.data);
                                this.$swal.fire("ลบสำเร็จ!", "", "success");
                                this.reForm();
                            })
                            .catch(err => {
                                console.log(err);
                                this.$swal.fire("ลบไม่สำเร็จ!", "", "error");
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
        delSubCate(subcate_id) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบหมวดหมู่ย่อยจริง ๆ หรือไม่ ?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: `ตกลง`,
                    cancelButtonText: `ยกเลิก`
                })
                .then(result => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .delete(`api/sub-category/${subcate_id}`)
                            .then(res => {
                                this.$swal.fire("ลบสำเร็จ!", "", "success");
                                this.reForm();
                            })
                            .catch(err => {
                                console.log(err);
                                this.$swal.fire("ลบไม่สำเร็จ!", "", "error");
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
        reForm() {
            this.selectCate = "main",
            this.optionMainCate = [],
            this.optionSubCate = [],
            this.selectMainCate = "",                        
            this.statusSubcate = false,
            this.nameMainCate = "";
            this.nameSubCate = "";
            this.errorsSelect = [];
            this.errors = [];
            this.errorsCate = [];
            this.fetchCategory();
            this.fetchSubCategory();
        },
        fetchCategory() {
            axios.get("api/category").then(res => {
                console.log(res.data);
                this.optionMainCate = res.data;
            });
        },
        fetchSubCategory() {
            axios.get("api/sub-category").then(res => {
                console.log(res.data);
                this.optionSubCate = res.data;
                console.log(this.optionSubCate);
            });
        },
        setSelectCate() {
            if (this.selectCate == "sub") {
                this.statusSubcate = true;
            } else {
                this.statusSubcate = false;
            }
        },
        addMainCate() {
            if (!this.nameMainCate) {
                this.errorsCate.push("กรุณากรอกข้อมูล");
            } else {
                let data = { nameMainCate: this.nameMainCate };
                axios.post("api/category", data).then(res => {
                    if (res.data == "ok") {
                        this.$swal.fire(
                            "สำเร็จ!",
                            "คุณได้เพิ่มหมวดหมู่หลักสำเร็จ!",
                            "success"
                        );
                        this.reForm();
                    } else {
                        this.$swal.fire(
                            "ไม่สำเร็จ!",
                            "เพิ่มหมวดหมู่หลักไม่สำเร็จ!",
                            "error"
                        );
                    }
                });
            }
        },
        addSubCate() {
            if (!this.nameSubCate) {
                this.errors.push("กรุณากรอกหมวดหมู่ย่อย.");
            }
            if (!this.selectMainCate) {
                this.errorsSelect.push("กรุณาเลือกหมวดหมู่หลัก.");
            } else {
                let data = {
                    nameSubCate: this.nameSubCate,
                    category_id: this.selectMainCate
                };
                axios.post("api/sub-category", data).then(res => {
                    if (res.data == "ok") {
                        this.$swal.fire(
                            "สำเร็จ!",
                            "คุณได้เพิ่มหมวดหมู่หลักสำเร็จ!",
                            "success"
                        );
                        this.reForm();
                    } else {
                        this.$swal.fire(
                            "ไม่สำเร็จ!",
                            "เพิ่มหมวดหมู่หลักไม่สำเร็จ!",
                            "error"
                        );
                    }
                });
            }
        }
    }
};
</script>
