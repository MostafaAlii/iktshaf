@extends('user.layouts.master')

@section('content')
    <div class="container sign-up-container our-services-container">
        <div class="row mt-5 mb-4" data-aos="zoom-in">
            <div class="col">
                <h3>
                    خدمات اكتشاف
                </h3>
            </div>
        </div>
        <div class="row g-lg-5" data-aos="zoom-in">
            <div class="col-4">
                <a class="text-reset text-decoration-none" href="#">
                    <div class="login-steps active">
                        <div class="row text-center">
                            <div class="icon col-12 col-md-auto">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="text col-12 col-md-auto">
                                خدماتنا
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a class="text-reset text-decoration-none" href="#">
                    <div class="login-steps">
                        <div class="row text-center">
                            <div class="icon col-12 col-md-auto">
                                <i class="fas fa-money-bill-wave-alt"></i>
                            </div>
                            <div class="text col-12 col-md-auto">
                                الدفع
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                {{--                <a class="text-reset text-decoration-none" href="#">--}}
                <div class="login-steps">
                    <div class="row text-center">
                        <div class="icon col-12 col-md-auto">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="text col-12 col-md-auto">
                            التسجيل
                        </div>
                    </div>
                </div>
                {{--                </a>--}}
            </div>
        </div>
        <div class="row" data-aos="zoom-in">
            <div class="col my-5">
                <div class="green-text-bg">
                    <h6>
                        قرار اختيار التخصص من القـرارات المهمة في حياتك..
                        <br>
                        هذا القرار هو مفتاح النجاح والتميز في المستقبل..
                        والخطأ فيه سيكلفك الكثير..!!
                        انضم معنا في (اكتشاف) وحدد مستقبلك بثقة عبر الخدمات التالية:
                    </h6>
                </div>
            </div>
        </div>
        <div class="row services-wrapper align-items-center">
            <div class="col-lg-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <p>
                            اكتشف ميولك عبر المقياس العربي للميول المهني (ACIA)
                        </p>
                    </li>
                    <li class="list-group-item">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <p>
                            ( AMIAS )تعرف على قدراتك عبر (المقياس العربي للقدرات)
                        </p>
                    </li>
                    <li class="list-group-item">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <p>
                            تعرف على أكثر من (80) مجال مهني مطلوب في المستقبل
                        </p>
                    </li>
                    <li class="list-group-item">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <p>
                            دورة تدريبية مسجلة تأخذك خطوة بخطوة لاختيار أفضل تخصص مناسب لك
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 my-3">
                <div class="green-text-bg text-center mx-auto" style="max-width: 500px;">
                    <h6>
                        جميع هذه الخدمات مقابل 200 ريال فقط
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-4">
                @auth
                    <button class="btn btn-primary px-5 py-3 mx-auto my-3 w-100 our-services-1-btn" type="button">
                        انت مسجل بالفعل
                    </button>
                @else
                    <a href="" class="btn btn-primary px-5 py-3 mx-auto my-3 w-100 our-services-1-btn" type="button">
                        نعم..أود التسجيل
                    </a>
                @endauth
            </div>

            <div class="col-12 text-center">
                <div class="input-group mb-3 mx-auto my-3 w-100 our-services-2-btn">
                    <input type="text" class="form-control border-0 code" placeholder="ادخل كود التسجيل"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary px-5 py-3 my-3 codeChk" id="button-addon2">تم</button>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.codeChk', function () {
                var code = $('.code').val();
                $.ajax({
                    type: "get",
                    url: "{{url('/coderg')}}/" + code,
                    success: function (data) {
                        if (data.status == true) {
                            window.location.href = data.url;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطاء...',
                                text: 'عزيزي المستخدم هذا الكودغير نشط!',
                            })
                        }
                    }, error: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطاء...',
                            text: 'عزيزي المستخدم هذا الكود غير صحيح!',
                            confirmButtonText: 'برجاء شراء الكود او استخدام كود أخر',
                        })
                    }
                });
            });
        });


    </script>
@endsection
