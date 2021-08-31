@extends('layouts.app')
@section('content')
    <section id="page-title">

        <div class="container">
            <div class="page-title">
                <h1>ติดต่อเรา</h1>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">หน้าแรก</a> </li>

                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6">
                    <h3 class="text-uppercase">Get In Touch</h3>
                    <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis.
                        Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>
                </div> --}}
                <div class="col-lg-6">
                    <h3 class="text-uppercase">ที่อยู่ &amp; แผนที่</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                ที่อยู่: กรมการแพทย์ กระทรวงสาธารณสุข 88/23 ถ.ติวานนท์ ต.ตลาดขวัญ อ.เมือง จ.นนทบุรี 11000
                                <br>
                                E-mail : team.winai2020@gmail.com
                                <br>
                                โทรศัพท์ : 0-2590-6157 , 0-2590-6159
                            </address>
                        </div>
                        
                    </div>
                    <div id="map" style="height: 300px;"></div>


                </div>
            </div>
        </div>

    </section>
@endsection
@push('js')
    <script>
        var map = L.map('map').setView([13.8477813, 100.5267616], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([13.8477813, 100.5267616]).addTo(map)
            .bindPopup('กลุ่มคุ้มครองจริยธรรม กฎหมายและวินัย กรมการแพทย์.')
            .openPopup();
    </script>
@endpush
