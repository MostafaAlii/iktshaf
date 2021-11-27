@extends('user.layouts.master')

@section('content')
    <!-- =============================================================== -->
    <!-- content Start -->
    <!-- =============================================================== -->
    <div class="profile-container">
        <div class="container">
            <div class="row pt-5 align-items-center justify-content-center" data-aos="zoom-in">
                <div class=" col-auto profile-image">
                    <img src="{{asset(Auth::user()->photo). '.png'}}" alt="...">
                </div>
                <div class="col-auto profile-text">
                    <h3>{{Auth::user()->name}}</h3>
                    <h3>مدرسة الثانوية الأولى</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-favorites">
        <div class="container">
            <div class="row gy-4" data-aos="zoom-in">
                <di class="col-12">
                    <a href="#" class="btn btn-primary btn-lg">
                        مفضلتي من التخصصات والدبلومات
                    </a>
                </di>
                <di class="col-12">
                    <a href="#" class="btn btn-primary btn-lg">
                        مفضلتي من التخصصات والدبلومات
                    </a>
                </di>
                <di class="col-12">
                    <a href="#" class="btn btn-primary btn-lg">
                        مفضلتي من التخصصات والدبلومات
                    </a>
                </di>
                <di class="col-12">
                    <a href="#" class="btn btn-primary btn-lg">
                        مفضلتي من التخصصات والدبلومات
                    </a>
                </di>
                <di class="col-12">
                    <a href="{{url('/')}}" class="btn btn-primary btn-lg home">
                        <i class="fas fa-home"></i>
                        الصفحة الرئيسية
                    </a>
                </di>
            </div>
        </div>
    </div>

    <!-- =============================================================== -->
    <!-- content End -->
    <!-- =============================================================== -->
@endsection
