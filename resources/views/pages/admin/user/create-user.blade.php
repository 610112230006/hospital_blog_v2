@extends('layouts.app')
@section('content')
<section id="page-title" class="page-title-classic">
    <div class="container">
        <div class="page-title">
            <h1>เพิ่มบัญชีผู้ใช้</h1>

            <!-- <span>Inspiration comes of working every day.</span> -->
        </div>
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="/"
                        >จัดการบัญชีผู้ใช้</a
                    >
                </li>
                <li>
                    <a href="/user"
                        >จัดการบัญชีผู้ใช้</a
                    >
                </li>
                <li><a>เพิ่มบัญชีผู้ใช้</a></li>
            </ul>
        </div>
    </div>
</section>

<createuser-component></createuser-component>
@endsection