@extends('user.layouts.master')

@section('content')
    <div class="container sign-up-container">
        <div class="row mt-5 mb-4" data-aos="zoom-in">
            <div class="col">
                <h3>
                    التسجيل في اكتشاف
                </h3>
            </div>
        </div>
        <div class="row g-lg-5" data-aos="zoom-in">
            <div class="col-4">
                <a class="text-reset text-decoration-none" href="{{route('ourServices')}}">
                    <div class="login-steps">
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
                <div class="login-steps active">
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
                <h5>
                    أهلا بك في (اكتشاف) وشكرا لاستثمارك في المستقبل.. والآن نرجو أن تقوم بإنشاء حسابك الشخصي على المنصة
                </h5>
            </div>
        </div>
        <div class="row" data-aos="zoom-in">
            <div class="col-12">
                <div class="form-wrapper">
                    <form class="row gx-5 needs-validation" method="POST" action="{{ url('/register') }}"  id="reg" novalidate>
                        @csrf
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip03" class="form-label">
                                    الاسم الكامل
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-user"></i>
                                        </span>
                                        <input type="text"  name="name" placeholder="أدخل الاسم الكريم" class="form-control"
                                               id="validationTooltip03" aria-describedby="basic-addon1" required>
                                        <div class="invalid-tooltip">
                                            ادخل بيانات صحيحة
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip11" class="form-label">
                                    البريد الاكتروني
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="far fa-envelope-open"></i>
                                        </span>
                                        <input placeholder="وهو اسم الدخول في المنصة" style="direction: rtl;"
                                               type="email" name="email" class="form-control email" id="validationTooltip11"
                                               aria-describedby="basic-addon11" required>
                                        <div class="invalid-tooltip">
                                            ادخل بريد الكترونى صحيح
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip12" class="form-label">
                                    كلمة المرور
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon12">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input placeholder="كلمة المرور يجب أن تتكون من 8 - 15 حرف" type="password"
                                               class="form-control" name="password" id="validationTooltip12"
                                               aria-describedby="basic-addon12" required>
                                        <div class="invalid-tooltip">
                                            ادخل كلمة المرور يجب أن تتكون من 8 - 15 حرف
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip13" class="form-label">
                                    تأكيد كلمة المرور
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon13">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input placeholder="حتى تتأكد من أنك ستتذكر كلمة المرور" type="password"
                                               class="form-control" id="validationTooltip13"
                                               aria-describedby="basic-addon13" required>
                                        <div class="invalid-tooltip">
                                            ادخل تاكيد كلمه المرور
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip14" class="form-label">
                                    مكان الإقامة
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon14">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                        <input placeholder="أدخل مكان الإقامة" type="text"
                                               class="form-control" id="validationTooltip14"
                                               aria-describedby="basic-addon14" required>
                                        <div class="invalid-tooltip">
                                            أدخل مكان الإقامة
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip15" class="form-label">
                                    الجنسية
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon15">
                                            <i class="far fa-flag"></i>
                                        </span>
                                        <!-- <input placeholder="هذا سيساعدنا على تقديم أفضل العروض لك" type="text"  class="form-control" id="validationTooltip15" aria-describedby="basic-addon15"  required> -->

                                        <select class="form-select" id="validationTooltip15" required>
                                            <option disabled selected>هذا سيساعدنا على تقديم أفضل العروض لك</option>
                                            <option value="1">مصري</option>
                                            <option value="2">سعودي</option>
                                        </select>

                                        <div class="invalid-tooltip">
                                            ادخل جنسيه صحيحه
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip16" class="form-label">
                                    رقم الجوال
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon16">
                                            <i class="fas fa-phone-alt"></i>
                                        </span>
                                        <input style="direction: rtl;"
                                               placeholder="تأكد من صحته لأننا سنرسل عليه رسالة تأكيد التسجيل"
                                               type="tel" name="mobile_num" class="form-control phone" id="validationTooltip16"
                                               aria-describedby="basic-addon16" required>
                                        <div class="invalid-tooltip">
                                            ادخل رقم جوال صالح
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip17" class="form-label">
                                    الصف الدراسي
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon17">
                                            <i class="fas fa-graduation-cap"></i>
                                        </span>
                                        <input placeholder="أدخل الصف الدراسي" type="text" class="form-control"
                                               id="validationTooltip17" aria-describedby="basic-addon17" required>
                                        <div class="invalid-tooltip">
                                            ادخل صف دراسى صحيح
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <div class="site-input">
                                <label for="validationTooltip18" class="form-label">
                                    المدرسة
                                </label>
                                <div class="input-gr-cus">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon18">
                                            <i class="fas fa-school"></i>
                                        </span>
                                        <input placeholder="أدخل اسم المدرسة التي تدرس فيها أو درست فيها سابقاً"
                                               type="text" class="form-control" id="validationTooltip18"
                                               aria-describedby="basic-addon18" required>
                                        <div class="invalid-tooltip">
                                            ادخل اسم المدرسه صحيح
                                        </div>
                                        <div class="valid-tooltip">
                                            صحيحة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary px-5 py-3 chackreg" type="submit">
                                تسجيل
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================================== -->
    <!-- Confirm Mobile Modal -->
    <!-- =============================================================== -->
    <div class="modal fade" id="confirmMobileModal" tabindex="-1" aria-labelledby="confirmMobileModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmMobileModalLabel">تاكيد رقم الموبايل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class=" sign-up-container confirm-number-container my-0">
                        <div class="row" data-aos="zoom-in">
                            <div class="col-12">
                                <div class="form-wrapper" style="box-shadow: unset;">
                                    <form class="row justify-content-center gx-5 needs-validation" novalidate>
                                        <div class="col-12 my-4 text-center">
                                            <h5>
                                                لقد قمنا بإرسال رسالة إلى رقم جوالك للتو.. نرجو إدخال الرسالة هنا
                                            </h5>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <div class="otp-wrapper otp-event ">
                                                <div class="otp-container d-flex justify-content-center">
                                                    <input type="tel" id="otp-number-input-1" class="otp-number-input otp1"
                                                           maxlength="1" autocomplete="off">
                                                    <input type="tel" id="otp-number-input-2" class="otp-number-input otp2"
                                                           maxlength="1" autocomplete="off">
                                                    <input type="tel" id="otp-number-input-3" class="otp-number-input otp3"
                                                           maxlength="1" autocomplete="off">
                                                    <input type="tel" id="otp-number-input-4" class="otp-number-input otp4"
                                                           maxlength="1" autocomplete="off">
                                                </div>
                                                <div>
                                                    <button id="confirm" type="button"
                                                            class="btn btn-primary px-5 py-3 otp-submit chackotp" disabled>إرسال
                                                    </button>
                                                    <br>
                                                    <button type="button"
                                                            class="btn btn-outline-primary orange px-5 py-2 mb-2 mt-4 ">
                                                        ارسل مجددا
                                                    </button>
                                                    <br>
                                                    <button type="button"
                                                            class="btn btn-outline-primary orange px-5 py-2 my-2">هل تود
                                                        اعادة ادخال رقم جوالك من جديد ؟
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =============================================================== -->
    <!-- Confirm Mobile Modal End -->
    <!-- =============================================================== -->

@endsection

@section('js')
    <!-- Script For This Page Only -->
    <script src="{{asset('assets/user/assets/js/confirm-number.js')}}"></script>
    <script>
        function submitForm() {
            var myModal = new bootstrap.Modal(document.getElementById('confirmMobileModal'), {
                keyboard: false
            })
            myModal.show();
        }
    </script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
$(document).on('click', '.chackreg', function() {
    var email = $('.email').val();
    var phone = $('.phone').val();
$.ajax({
 type: "get",
 url: "{{url('/register')}}/" + email +"/" + phone,
 success: function(data) {
     if(data.status == true){
        var myModal = new bootstrap.Modal(document.getElementById('confirmMobileModal'), {
                keyboard: false
            })
            myModal.show();
     }else{
         Swal.fire({
         icon: 'error',
         title: 'خطاء...',
         text:data.message,
         confirmButtonText: 'برجاءالمحاولة مرة أخرى',

         })
     }
 },error:function(data) {
     Swal.fire({
         icon: 'error',
         title: 'خطاء...',
         text:data.message,
         confirmButtonText: 'برجاءالمحاولة مرة أخرى',
         })
 }
});
});
});


</script>
<script>
    $(document).ready(function() {
    $(document).on('click', '.chackotp', function() {
        var otp= $('.otp4').val()+$('.otp3').val()+$('.otp2').val()+$('.otp1').val();
    $.ajax({
    type: "get",
    url: "{{url('/otpch')}}/" + otp ,
    success: function(data) {
     if(data.status == true){
        document.getElementById("reg").submit();
     }else{
        wal.fire({
        icon: 'error',
        title: 'خطاء...',
        text: data.message,
        confirmButtonText: ' برجاء اعادة المحاولة ',
        })
    }
}  ,error: function(data) {
            Swal.fire({
                icon: 'error',
                title: 'خطاء...',
                text: 'برجاء اعادة اءاسل الكود مرة أخرى او  التاكد من رقم الجوال!',
                confirmButtonText: ' برجاء اعادة المحاولة ',
                })
        }
    });
    });
    });
    </script>

    <!--Start Validation char Form-->
    <script>
        $('.vChar').keypress(function (e) {

            var regexAR = /^[\a-zأ-ي-pL\s\-]+$/;

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (regexAR.test(str)) {
                return true;

            } else {
                e.preventDefault();
                alert('هذا الحرف غير مسموحة به');
                return false;
            }
        });
    </script>

    <script>
        $('.vPhone').keypress(function (e) {

            var regexAR = /[+ 0-9]/;

            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

            if (regexAR.test(str)) {
                return true;

            } else {
                e.preventDefault();
                alert('هذا الحرف غير مسموحة به');
                return false;
            }
        });
    </script>
    <!--Start Validation char Form-->

@endsection
