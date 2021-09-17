<template lang="">
    <nav class="navbar navbar-expand-md shadow-sm navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand pb-2" href="/"
                ><img src="images/logos/logo-moph.png" height="50" width="200"
            /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/"
                            >หน้าแรก <span class="sr-only">(current)</span></a
                        >
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            เกี่ยวกับเรา
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=5"
                                    >อํานาจหน้าที่</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=6"
                                    >วิสัยทัศน์ พันธกิจ</a
                                >
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >โครงสร้างกลุ่ม
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="contentbysubcate?id=13"
                                            >งานกฎหมาย นิติกรรม และคดี</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >งานสอบสวน วินัย และความ
                                            รับผิดทางละเมิด
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >งานคุ้มครองจริยธรรม</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >งบประมาณ<i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >โครงการ</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >แผนการจัดซื้อจัดจ้าง
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >งานคุ้มครองจริยธรรม</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=16"
                                    >Happy DMS</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=17"
                                    >ปฏิทินกิจกรรม</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            งานกฎหมาย
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=18"
                                    >กฎหมายที่เกี่ยวข้อง</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=19"
                                    >มอบอำนาจ</a
                                >
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >กฎหมายการแพทย์
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=2"
                                            >กฎหมาย COVID-19</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=20"
                                            >แรงงานทางทะเล
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=22"
                                            >การจัดการนวัตกรรมทางการแพทย์</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >นิติกรรมและสัญญา
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=23"
                                            >กฎหมายระเบียบการลาศึกษาฝึกอบรม</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >กฎหมาย ระเบียบพัสดุ</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >หนังสือเวียนเกี่ยวกับนิตกิรรมและสัญญา</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=26"
                                            >ตัวอย่างสัญญา</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=27"
                                    >MOU กรมการแพทย์</a
                                >
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >คดี <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=28"
                                            >สถิติคดี</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=29"
                                            >หนังสือเวียนเกี่ยวกับคดี</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >การแจ้งความดําเนินคดี</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=30"
                                            >ตัวอย่างแบบฟอร์ม</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=31"
                                    >ตอบข้อหารือ / ให้ความเห็น</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=32"
                                    >การอบรม</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=33"
                                    >รวมคําพิพากษา</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            งานวินัย/ละเมิด
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >วินัย <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=3"
                                            >กฎหมายที่เกี่ยวข้อง</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=34"
                                            >คู่มือการดําเนินการทางวินัย
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=35"
                                            >แนวทางการลงโทษ</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=36"
                                            >สถิติิการดําเนินการทางวินัย</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >อุทธรณ์ <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=37"
                                            >กฎหมายที่เกี่ยวข้อง</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >ร้องทุกข์ <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=38"
                                            >กฎหมายที่เกี่ยวข้อง</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >ความรับผิดทางละเมิด
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=39"
                                            >กฎหมายที่เกี่ยวข้อง</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=40"
                                            >คําวินิจฉัยความรับผิดทางละเมิด</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >แนวทางเสริมสร้างวินัย
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=41"
                                            >หนังสือ ก.พ.</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=42"
                                            >สื่อเสริมสร้างวินัย</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=43"
                                    >ตอบข้อหารือ / ให้ความเห็น</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=44"
                                    >การอบรม</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=45"
                                    >รวมคําพิพากษา</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=46"
                                    >บทความที่น่าสนใจ-ตอบข้อหารือ</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            งานคุ้มครองจริยธรรม
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="#"
                                    >Anti Corruption
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=47"
                                            >การจัดการความเสี่ยงด้านทุจริต</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=48"
                                            >มาตรการป้องกันการทุจริต
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=49"
                                            >การจัดการผลประโยชน์ทับซ้อน</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="content-by-subcate?id_subcate=50"
                                    >แผนปฏิบัติราชการ
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=50"
                                            >2564 (ชาติ–กระทรวง–กรม รายละเอียด
                                            การรายงานผล)</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="content-by-subcate?id_subcate=51"
                                    >โครงการส่งเสริมคุณธรรมปัองกัน
                                    และปราบปรามการทุจริต
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=51"
                                            >2564 (รายละเอียด–รายงานผล)</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="content-by-subcate?id_subcate=52"
                                    >ITA <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="content-by-subcate?id_subcate=52"
                                            >2564 (รายละเอียด–การ
                                            ดําเนินงาน–ผล)</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=53"
                                    >คํารับรองการปฏิบัติราชการ</a
                                >
                            </li>
                            <li class="dropdown-submenu">
                                <a
                                    class="dropdown-item dropdown-toggle"
                                    href="content-by-subcate?id_subcate=54"
                                    >คุ้มครองจริยธรรม
                                    <i class="icon-chevron-right"></i
                                ></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >การดําเนินงานของคณะกรรมการจริยธรรม</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >ประมวลจริยธรรม</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >ข้อกําหนดจริยธรรม</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >ธรรมาภิบาล(เปิดเผยข้อมูล)</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >องค์กรคุณธรรม</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >องค์กรต้นแบบด้านสิทธิมนุษยชน</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href=""
                                            >ความเสมอภาค หญิง-ชาย</a
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=55"
                                    >สื่อเผยแพร่</a
                                >
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="content-by-subcate?id_subcate=56"
                                    >การประชุม อบรม</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="content-by-cate?id_cate=4"
                            >ร้องเรียน/ร้องทุกข์</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">ติดต่อเรา</a>
                    </li>
                </ul>
                <li v-if="isLogin" class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarScrollingDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <i class="icon-user"></i>
                        {{ `${user.f_name} ${user.l_name}` }}
                        <i class="icon-chevron-down"></i>
                    </a>
                    <ul
                        class="dropdown-menu"
                        aria-labelledby="navbarScrollingDropdown"
                    >
                        <li>
                            <a class="dropdown-item" href="/user-edit-personal"
                                >จัดการบัญชีผู้ใช้</a
                            >
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="logoutt"
                                >ออกจากระบบ</a
                            >
                        </li>
                    </ul>
                </li>
                <a class="text-center" href="/login" v-else>
                    <i class="icon-user"></i>
                    เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </nav>

    <!-- <div> -->
</template>
<script>
export default {
    data() {
        return {
            listOne: false,
            listTwo: false,
            listThree: false,
            listFour: false,
            user: [],
            isLogin: false
        };
    },
    mounted() {
        axios.get("auth-user").then(res => {
            console.log(res.data);
            if (res.data.id == null) {
                this.isLogin = false;
            } else {
                this.user = res.data;
                this.isLogin = true;
            }
        });
    }
};
</script>
<style>
.navbar-nav li:hover > ul.dropdown-menu {
    display: block;
}
.dropdown-submenu {
    position: relative;
}
.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
}
</style>
