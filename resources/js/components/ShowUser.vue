<template>
    <div>
        <section id="page-title" class="page-title-classic">
            <div class="container">
                <div class="page-title">
                    <h1>จัดการบัญชีผู้ใช้</h1>

                    <!-- <span>Inspiration comes of working every day.</span> -->
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/"
                                >หน้าแรก</a
                            >
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
                            <h4>รายชื่อผู้ใช้</h4>
                            <a
                                href="user-create"
                                class="btn btn-primary"
                            >
                                เพิ่มบัญชีผู้ใช้
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>                                        
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">นามสกุล</th>
                                        <th scope="col">อีเมล</th>
                                        <th scope="col">
                                            หมวดหมู่ที่รับผิดชอบ
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, index) in users"
                                        :key="index"
                                    >
                                        <th scope="row">{{ index + 1 }}</th>                                        
                                        <td>{{ user.f_name }}</td>
                                        <td>{{ user.l_name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>
                                            <a :href="`/edit-user?id_user=${user.id}`">
                                                <i class="icon-edit">
                                                    แก้ไข
                                                </i>
                                            </a>
                                            |
                                            <a
                                                @click.prevent="
                                                    DelData(user.id)
                                                "
                                                href=""
                                            >
                                                <i class="icon-trash-2">
                                                    ลบ
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
            users: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get("api/user").then(res => {
                console.log(res.data)
                this.users = res.data;
            });
        },
        DelData(id) {
            this.$swal
                .fire({
                    title: "คุณต้องการลบ บัญชีผู้ใช้นี้จริง ๆ หรือไม่?",
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
                            .delete(`api/user/${id}`)
                            .then(res => {
                                this.$swal.fire(
                                    "สำเร็จ!",
                                    "คุณลบบัญชีนี้สำเร็จ.",
                                    "success"
                                );
                                this.fetchData();
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
        }
    }
};
</script>
