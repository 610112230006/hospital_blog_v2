<template>
    <div>
        <section id="page-content">
            <div class="container">
                <div class="row">
                    <div class="content col-lg-9">
                        <h3>กรอกข้อมูล</h3>
                        <form>
                            <div class="form-group row">
                                <label
                                    for="example-email-input"
                                    class="col-2 col-form-label"
                                    >อีเมล</label
                                >
                                <div class="col-10">
                                    <input
                                        :class="{ 'is-invalid': error.email }"
                                        class="form-control"
                                        type="email"
                                        name="email"
                                        v-model="form.email"
                                        id="example-email-input"
                                    />
                                    <div v-if="error.email" class="is-invalid">
                                        {{ error.email[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="example-text-input"
                                    class="col-2 col-form-label"
                                    >รหัสผ่าน</label
                                >
                                <div class="col-10">
                                    <input
                                        :class="{ 'is-invalid': error.password }"
                                        class="form-control"
                                        v-model="form.password"
                                        type="text"
                                        name="password"
                                        id="example-text-input"
                                    />
                                    <div
                                        v-if="error.password"
                                        class="is-invalid"
                                    >
                                        {{ error.password[0] }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="example-text-input"
                                    class="col-2 col-form-label"
                                    >ชื่อ</label
                                >
                                <div class="col-10">
                                    <input
                                        :class="{ 'is-invalid': error.f_name }"
                                        class="form-control"
                                        type="text"
                                        name="f_name"
                                        v-model="form.f_name"
                                        id="example-text-input"
                                    />
                                    <div v-if="error.f_name" class="is-invalid">
                                        {{ error.f_name[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="example-text-input"
                                    class="col-2 col-form-label"
                                    >นามสกุล</label
                                >
                                <div class="col-10">
                                    <input
                                        :class="{ 'is-invalid': error.l_name }"
                                        class="form-control"
                                        type="text"
                                        name="l_name"
                                        v-model="form.l_name"
                                        id="example-text-input"
                                    />
                                    <div v-if="error.l_name" class="is-invalid">
                                        {{ error.l_name[0] }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="example-email-input"
                                    class="col-2 col-form-label"
                                    >หมวดหมู่ที่รับผิดชอบ</label
                                >
                                <div class="col-10">
                                    <select
                                        class="form-control"
                                        v-model="form.category_id"
                                        id=""
                                    >
                                        <option selected value="0"
                                            >ทุกหมวดหมู่</option
                                        >
                                        <option
                                            v-for="(optionCate,
                                            index) in optionCates"
                                            :key="index"
                                            :value="optionCate.id"
                                        >
                                            {{ optionCate.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a
                                    href="javascript:history.back()"
                                    class="btn btn-white"
                                    >ยกเลิก</a
                                >
                                <button
                                    @click.prevent="AddForm"
                                    class="btn btn-primary"
                                >
                                    ตกลง
                                </button>
                            </div>
                        </form>
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
            form: {
                email: "",
                password: "",
                f_name: "",
                l_name: "",
                category_id: "0"
            },
            optionCates: [],
            error: []
        };
    },
    mounted() {
        axios
            .get("api/category")
            .then(res => {
                console.log(res.data);
                this.optionCates = res.data;
            })
            .catch(err => {
                console.log(err.response.data);
            });
    },
    methods: {
        AddForm() {
            console.log(this.form)
            axios
                .post("api/user", this.form)
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
                            window.location.href = "user";
                        });
                })
                .catch(err => {
                    this.error = err.response.data.errors;
                });
        }
    }
};
</script>
