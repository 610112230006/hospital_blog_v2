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
                                        แก้ไข
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
    props: ["user"],
    data() {
        return {
            form: [],
            error: [],
            optionCates: []
        };
    },
    mounted() {
        this.form = {
            email: this.user.email,
            f_name: this.user.f_name,
            l_name: this.user.l_name,
            category_id: this.user.category_id
        };
    },
    methods: {
        updateUser() {
            axios
                .patch(`api/user/${this.user.id}`, this.form)
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
                            window.location.href = "/";
                        });
                })
                .catch(err => {
                    console.log(err.response.data);
                    this.error = err.response.data.errors;
                });
        }
    }
};
</script>
<style lang=""></style>
