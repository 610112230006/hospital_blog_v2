<template lang="">
    <div>
        <section
            id="page-content"
            class="sidebar-right"
            style="transform: none;"
        >
            <div class="container" style="transform: none;">
                <div class="row" style="transform: none;">
                    <!-- post content -->
                    <div class="content col-lg-9">
                        <!-- Page title -->
                        <div class="page-title mb-5">
                            <h1>ข่าวประชาสัมพันธ์ (ล่าสุด)</h1>
                        </div>
                        <!-- end: Page title -->

                        <div
                            class="card mb-3"
                            v-for="newContent in newContents"
                        >
                            <div class="row p-3 no-gutters">
                                <div class="col-md-4 align-self-center">
                                    <a
                                        :href="
                                            '/detail-content?id_content=' +
                                                newContent.id
                                        "
                                    >
                                        <carousel
                                            :perPage="1"
                                            :autoplay="true"
                                            :paginationEnabled="false"
                                            :autoplayHoverPause="true"
                                            :loop="true"
                                            :autoplayTimeout="3000"
                                        >
                                            <slide
                                                v-for="(newImgContent,
                                                index) in newImgContents"
                                                :key="index"
                                                v-if="
                                                    newContent.id ==
                                                        newImgContent.id_content
                                                "
                                            >
                                                <img
                                                    alt=""
                                                    class="img-fluid"
                                                    width="100%"
                                                    :src="
                                                        'storage/' +
                                                            newImgContent.url
                                                    "
                                                />
                                            </slide>
                                        </carousel>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="card-title">
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        newContent.id
                                                "
                                                >{{ newContent.title }}
                                            </a>
                                        </h2>
                                        <!--<p class="card-text">
                                        </p>-->
                                        <p class="card-text">
                                            <a
                                                :href="
                                                    '/detail-content?id_content=' +
                                                        newContent.id
                                                "
                                                class="item-link"
                                                >อ่านต่อ...
                                                <i
                                                    class="icon-chevron-right"
                                                ></i
                                            ></a>
                                            <br />
                                            <span class="post-meta-date">
                                                <i class="icon-clock"></i
                                                >{{
                                                    `${newContent.time_show}, `
                                                }}</span
                                            >
                                            <span class="post-meta-date">
                                                <i class="icon-user"></i
                                                >ผู้เขียน
                                                {{
                                                    `${newContent.f_name} ${newContent.l_name}, `
                                                }}</span
                                            >
                                            <span
                                                v-for="statistic in statistics"
                                                v-if="
                                                    statistic.id_content ==
                                                        newContent.id
                                                "
                                                class="post-meta-date"
                                            >
                                                <i class="icon-eye"></i>เข้าชม
                                                {{ statistic.number_preview }}
                                                ครั้ง</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end: Blog -->
                        <!-- Pagination -->
                    </div>
                    <!-- end: post content -->
                    <!-- Sidebar-->
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
                <div class="row">
                    <div class="content col-lg-9">
                        <h1>การดำเนินงาน</h1>
                        <carousel :perPage="4">
                            <slide
                                v-for="jobContent in jobContents"
                                class="p-3"
                            >
                                <a
                                    :href="
                                        'detail-content?id_content=' +
                                            jobContent.id
                                    "
                                >
                                    <div class="card">
                                        <img
                                            class="card-img-top"
                                            :src="'storage/' + jobContent.url"
                                            alt=""
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ jobContent.title }}
                                            </h5>
                                            <p class="card-text"></p>
                                        </div>
                                    </div>
                                </a>
                            </slide>
                        </carousel>
                        <div class="line"></div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="content col-lg-9">
                        <h3>ดาวน์โหลดเอกสาร</h3>
                        <div class="card" v-for="docSubCate in docSubCates"  @click="getDocContent(docSubCate.id)">
                            <!-- <img class="card-img-top" src="holder.js/100px180/" alt=""> -->
                            <div class="card-body">
                                <div  class="card-title d-flex justify-content-between">
                                    <h4   
                                       
                                        
                                    >
                                        {{ docSubCate.name }}
                                    </h4>
                                    <i class="icon-chevron-down"></i>
                                </div>
                                
                                
                                <div class="card-text">
                                   
                                    <div

                                        v-for="docContent in docContents"
                                        v-if="
                                            docContent.id_subcate ==
                                                docSubCate.id
                                        "
                                    >
                                        <hr/>
                                        <div
                                            class="row d-flex justify-content-between"
                                        >
                                            <div class="col-md-9">
                                                <a
                                                    href="javascript:void(0)"
                                                    @click="
                                                        dowloadFile(docContent.url)
                                                    "
                                                >
                                                    {{ docContent.file_name }}
                                                </a>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                {{ docContent.created_at }}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div>
                    <!-- Sidebar-->

                    <!-- end: sidebar-->
                </div>
            </div>
            <div class="row">
                <section class="p-t-60">
                    <div class="container">
                        <div class="heading-text heading-section text-center">
                            <span class="lead">หน่วยงานที่เกี่ยวข้อง</span>
                        </div>
                        <carousel
                            :perPage="5"
                            :autoplay="true"
                            :paginationEnabled="false"
                            :autoplayHoverPause="true"
                            :loop="true"
                            :autoplayTimeout="3000"
                        >
                            <slide class="">
                                <a href="https://anamai.moph.go.th/th">
                                    <img
                                        src="images/banner/logo-1.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                            <slide class="">
                                <a href="https://www.dms.go.th/">
                                    <img
                                        src="images/banner/logo-2.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                            <slide class="">
                                <a href="https://ddc.moph.go.th/index.php">
                                    <img
                                        src="images/banner/logo-3.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                            <slide class="">
                                <a href="https://www.dmh.go.th/">
                                    <img
                                        src="images/banner/logo-4.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                            <slide class="">
                                <a
                                    href="https://www.dtam.moph.go.th/index.php/th/"
                                >
                                    <img
                                        src="images/banner/logo-5.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                            <slide class="">
                                <a href="https://www3.dmsc.moph.go.th/">
                                    <img
                                        src="images/banner/logo-6.png"
                                        style="width:100%;max-width:200px"
                                    />
                                </a>
                            </slide>
                        </carousel>
                        <div class="line"></div>
                    </div>
                </section>
            </div>
            <div class="row">
                <section
                    class="text-light"
                    data-bg-video="video/pexels-waves.mp4"
                >
                    <div class="html5vid video-loaded" id="video-jb3im">
                        <video
                            playsinline=""
                            loop="false"
                            muted="true"
                            poster=""
                            preload="auto"
                        >
                            <source
                                src="video/pexels-waves.mp4"
                                type="video/mp4"
                            />
                        </video>
                    </div>
                    <div class="bg-overlay" data-style="5"></div>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
                                <!-- Stats item -->
                                <div class="text-center">
                                    <span
                                        class="display-4 d-block text-dark mb-2"
                                        >{{ read_to_day.sum_read }}</span
                                    >
                                    <p class="lead">
                                        ยอดผู้เข้าชมวันนี้
                                    </p>
                                </div>
                                <!-- end: Stats item-->
                            </div>
                            <div class="col-md-4">
                                <!-- Stats -->
                                <div class="text-center">
                                    <span
                                        class="display-4 d-block text-dark mb-2"
                                        >{{ read_to_mount.sum_read }}</span
                                    >
                                    <p class="lead">ยอดผู้เข้าชมเดือนนี้</p>
                                </div>
                                <!-- end: Stats item-->
                            </div>
                            <div class="col-md-4">
                                <!-- Stats -->
                                <div class="text-center">
                                    <span
                                        class="display-4 d-block text-dark mb-2"
                                        >{{ read_to_all.sum_read }}</span
                                    >
                                    <p class="lead">ยอดผู้เข้าชมทั้งหมด</p>
                                </div>
                                <!-- end: Stats item -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <modal
            name="my-first-modal"
            resizable="true"
            height="auto"
            adaptive="true"
        >
            <carousel
                :perPage="1"
                :loop="true"
                :autoplay="true"
                :autoplayTimeout="3000"
            >
                <slide v-for="popup in popups">
                    <img
                        alt=""
                        class="img-thumbnail"
                        width="100%"
                        :src="'storage/' + popup.url"
                    />
                </slide>
            </carousel>

            <hr />
            <div class="d-flex justify-content-center">
                <button class="btn btn-danger" @click="hide">ปิด</button>
            </div>
        </modal>
    </div>
</template>
<script>
import SlideNew from "./SlideNew";
export default {
  components: {
    "slidenew-component": SlideNew,
  },
  data() {
    return {
      newContents: [],
      newImgContents: [],
      statistics: [],
      docSubCates: [],
      docContents: [],
      jobContents: [],
      jobImage: [],
      read_to_day: [],
      read_to_mount: [],
      read_to_all: [],
      popups: [],
    };
  },
  mounted() {
    this.show();
    // add sum
    this.addRead();
    // read
    this.getReadToDay();
    this.getReadToMount();
    this.getReadToAll();
    this.getPopup();
    // fetch data
    axios
      .get("api/cont-new-home")
      .then((res) => {
        this.newContents = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
    axios.get("api/get-all-image").then((res) => {
      this.newImgContents = res.data;
    });
    axios
      .get("api/get-statistic-all")
      .then((res) => {
        this.statistics = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
    axios
      .get("api/get-job-home")
      .then((res) => {
        this.jobContents = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });

    this.getSubCateDoc();
  },
  methods: {
    show() {
      this.$modal.show("my-first-modal");
    },
    hide() {
      this.$modal.hide("my-first-modal");
    },
    getPopup() {
      axios.get("api/get-img-popup").then((res) => {
        this.popups = res.data;
      });
    },
    addRead() {
      axios
        .get("api/get-add-sum-read")
        .then((res) => {})
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getReadToDay() {
      axios
        .get("api/get-read-to-day")
        .then((res) => {
          this.read_to_day = res.data[0];
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getReadToMount() {
      axios
        .get("api/get-read-to-mount")
        .then((res) => {
          this.read_to_mount = res.data[0];
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getReadToAll() {
      axios
        .get("api/get-read-to-all")
        .then((res) => {
          this.read_to_all = res.data[0];
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getSubCateDoc() {
      axios
        .get("api/get-sub-cate-doc")
        .then((res) => {
          this.docSubCates = res.data;
        })
        .catch((err) => {
          console.log(err.response.data);
        });
    },
    getDocContent(id) {
      axios.get("api/get-content-doc/" + id).then((res) => {
        console.log(res.data);
        this.docContents = res.data;
      });
      console.log(id);
    },
    dowloadFile(id) {
      window.open(`storage/${id}`);
    },
  },
};
</script>
