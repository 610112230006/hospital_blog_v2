<template lang="">
    <div>
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
                                            readonly
                                            :class="{
                                                'is-invalid': error.email
                                            }"
                                            class="form-control"
                                            type="email"
                                            name="email"
                                            v-model="form.email"
                                            id="example-email-input"
                                        />
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
                                            class="form-control"
                                            type="text"
                                            name="f_name"
                                            v-model="form.f_name"
                                            id="example-text-input"
                                            :class="{
                                                'is-invalid': error.f_name
                                            }"
                                        />
                                        <div
                                            v-if="error.f_name"
                                            class="is-invalid"
                                        >
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
                                            class="form-control"
                                            type="text"
                                            name="l_name"
                                            v-model="form.l_name"
                                            id="example-text-input"
                                            :class="{
                                                'is-invalid': error.l_name
                                            }"
                                        />
                                        <div
                                            v-if="error.l_name"
                                            class="is-invalid"
                                        >
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
                                        @click.prevent="updateUser"
                                        class="btn btn-primary"
                                    >
                                        เพิ่มบัญชีผู้ใช้
                                    </button>
                                </div>
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
    props: ["id_user"],
    data() {
        return {
            form: [],
            error: [],
            optionCates: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get(`api/user/${this.id_user}`).then(res => {
                this.form = {
                    email: res.data.email,
                    f_name: res.data.f_name,
                    l_name: res.data.l_name,
                    category_id: res.data.category_id
                };
            });
            axios
                .get("api/category")
                .then(res => {
                    this.optionCates = res.data;
                })
                .catch(err => {
                    console.log(err.response.data);
                });
        },
        updateUser() {
            axios
                .patch(`api/user/${this.id_user}`, this.form)
                .then(res => {
                    this.$swal
                        .fire({
                            position: "center-center",
                            icon: "success",
                            title: "สำเร็จ",
                            showConfirmButton: false,
                            timer: 1000
                        })
                        .then(function() {
                            window.location.href = "/user";
                        });
                })
                .catch(err => {
                    this.error = err.response.data.errors;
                });
        }
    }
};
</script>
<style lang=""></style>
