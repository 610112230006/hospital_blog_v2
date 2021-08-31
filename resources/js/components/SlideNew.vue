<template lang="">
    <div
        class="theiaStickySidebar"
        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"
    >
        <!--<div class="widget ">
                                <h4 class="widget-title">มีผู้เข้าชมมากสุด</h4>
                                <div class="post-thumbnail-list">
                                    <div class="post-thumbnail-entry">
                                        <img
                                            alt=""
                                            src="images/blog/thumbnail/5.jpg"
                                        />
                                        <div class="post-thumbnail-content">
                                            <a href="#"
                                                >A true story, that never been
                                                told!</a
                                            >
                                            <span class="post-date"
                                                ><i class="icon-clock"></i> 6m
                                                ago</span
                                            >
                                            <span class="post-category"
                                                ><i class="fa fa-tag"></i>
                                                Technology</span
                                            >
                                        </div>
                                    </div>
                                    <div class="post-thumbnail-entry">
                                        <img
                                            alt=""
                                            src="images/blog/thumbnail/6.jpg"
                                        />
                                        <div class="post-thumbnail-content">
                                            <a href="#"
                                                >Beautiful nature, and rare
                                                feathers!</a
                                            >
                                            <span class="post-date"
                                                ><i class="icon-clock"></i> 24h
                                                ago</span
                                            >
                                            <span class="post-category"
                                                ><i class="fa fa-tag"></i>
                                                Lifestyle</span
                                            >
                                        </div>
                                    </div>
                                    <div class="post-thumbnail-entry">
                                        <img
                                            alt=""
                                            src="images/blog/thumbnail/7.jpg"
                                        />
                                        <div class="post-thumbnail-content">
                                            <a href="#"
                                                >Lorem ipsum dolor sit amet</a
                                            >
                                            <span class="post-date"
                                                ><i class="icon-clock"></i> 11h
                                                ago</span
                                            >
                                            <span class="post-category"
                                                ><i class="fa fa-tag"></i>
                                                Lifestyle</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="widget widget-tweeter"
                                data-username="envato"
                                data-limit="2"
                            >
                                <h4 class="widget-title">Recent Tweets</h4>
                                <div id="twitter-cnt">
                                    <span>Loading...</span>
                                </div>
                            </div>-->
        <div class="widget  widget-tags">
            <h4 class="widget-title">Tags</h4>
            <div class="tags">
                <a href="#">งานกฏหมาย</a>
                <a href="#">งานวินัย/ละเมิด</a>
                <a href="#">งานคุ้มครองจริยธรรม</a>
                <a href="#">ร้องเรียน/ร้องทุก</a>
                <a href="#">อำนาจหน้าที่</a>
                <a href="#">วิสัยทัศณ์</a>
                <a href="#">งบระมาณ</a>
                <a href="#">ITA</a>
                <a href="#">โครงสร้าง</a>
                <a href="#">ติดต่อเรา</a>
            </div>
        </div>
        <div class="widget  widget-newsletter">
            <form
                class="widget-subscribe-form"
                novalidate=""
                action="include/subscribe-form.php"
                role="form"
                method="post"
            >
                <h4 class="widget-title">Newsletter</h4>
                <small>Stay informed on our latest news!</small>
                <div class="input-group">
                    <input
                        type="email"
                        required=""
                        name="widget-subscribe-form-email"
                        class="form-control required email"
                        placeholder="Enter your Email"
                    />
                    <span class="input-group-btn">
                        <button
                            type="submit"
                            id="widget-subscribe-submit-button"
                            class="btn btn-primary"
                        >
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
