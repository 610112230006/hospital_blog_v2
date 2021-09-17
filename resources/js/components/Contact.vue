<template lang="">
    <div>
        <section
            id="page-title"
            style="background-image: url('images/parallax/contract.png'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;"
        >
            <div class="container">
                <div class="page-title">
                    <h1 class="text-white"><strong>ติดต่อเรา</strong></h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <!--<li><a href="/"><strong>หน้าแรก</strong></a></li>-->
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="text-uppercase">ที่อยู่ &amp; แผนที่</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <address>
                                    ที่อยู่: กรมการแพทย์ กระทรวงสาธารณสุข 88/23
                                    ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี
                                    11000
                                    <br />
                                    E-mail : law.dms@dms.mail.go.th
                                    <br />
                                    โทรศัพท์ : 0-2590-6157 , 0-2590-6159
                                </address>
                            </div>
                        </div>
                        <div id="map" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    mounted() {
        var map = L.map("map").setView([13.8484191, 100.5273796], 13);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([13.8477813, 100.5267616])
            .addTo(map)
            .bindPopup("กลุ่มคุ้มครองจริยธรรม กฎหมายและวินัย กรมการแพทย์.")
            .openPopup();
    }
};
</script>
<style lang=""></style>
