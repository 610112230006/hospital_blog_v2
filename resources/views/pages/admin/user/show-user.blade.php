@extends('layouts.app')

@section('content')
    <section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="page-title">
                <h1>จัดการบัญชีผู้ใช้</h1>

                <!-- <span>Inspiration comes of working every day.</span> -->
            </div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="/">หน้าแรก</a>
                    </li>
                    <li><a>จัดการบัญชีผู้ใช้</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-9">
                    <div class="d-flex justify-content-between">
                        <h4>รายชื่อผู้ใช้</h4>
                        <a
                            href="{{ route('user.create', []) }}"
                            class="btn btn-primary"
                        >
                            เพิ่มบัญชีผู้ใช้
                        </a>
                    </div>
                    <h4>Table</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">email</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$user->email}}</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
