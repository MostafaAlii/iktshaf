<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ektshaf</title>
    <!-- link For link tag FavIcon -->
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-3Wg4cUtDziGc50xL4PCr98iap+jlvY2rTTsQU5F2vcf+KROJydycFaCjmlZVA1oG" crossorigin="anonymous">
    <!-- Aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/user/assets/css/all.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" href="{{asset('assets/user/assets/css/style.css')}}">

</head>

<body>
<!-- =============================================================== -->
<!-- Loader -->
<!-- =============================================================== -->
<div class="loader">
    <div class="svg-wrapper">
        <svg width="135" height="140" viewBox="0 0 135 140" xmlns="http://www.w3.org/2000/svg" fill="#FF7F28">
            <rect y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120"
                         calcMode="linear" repeatCount="indefinite"/>
                <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite"/>
            </rect>
            <rect x="30" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.25s" dur="1s"
                         values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/>
                <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite"/>
            </rect>
            <rect x="60" width="15" height="140" rx="6">
                <animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120"
                         calcMode="linear" repeatCount="indefinite"/>
                <animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite"/>
            </rect>
            <rect x="90" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.25s" dur="1s"
                         values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/>
                <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite"/>
            </rect>
            <rect x="120" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120"
                         calcMode="linear" repeatCount="indefinite"/>
                <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite"/>
            </rect>
        </svg>
        <!-- Loader Text -->
        <!-- <p>لحظة من فضلك</p> -->
    </div>
</div>
<!-- =============================================================== -->
<!-- Loader End -->
<!-- =============================================================== -->

<!-- =============================================================== -->
<!-- Confirm Mobile Start -->
<!-- =============================================================== -->
<div class="container reset-password">
    <div class="row align-items-center" data-aos="zoom-in">
        <div class="col-12">
            <div class="col-12 my-4 text-center">
                <h3>
                    استعادة كلمة المرور
                </h3>
            </div>
            <form method="POST" action="{{ route('password.email') }}" class="row justify-content-center gy-5">
                @csrf
                <div class="col-md-12 text-center">
                    <div class="input-gr">
                        <label class="mb-3" for="mobileInp">
                            أرجو إدخال البريد الإلكتروني المرتبط بحسابك
                        </label>
                        <div class="input-group mx-auto">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control border" placeholder="@gmail.com"
                                  autocomplete="off" aria-describedby="button-addon2u1">
                            <button class="btn btn-primary px-5 py-3" type="submit">تم</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- =============================================================== -->
<!-- Confirm Mobile End -->
<!-- =============================================================== -->

<!-- Bootstrap Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js"
        integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous">
</script>
<!-- Aos -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Font Awesome -->
<script src="{{asset('assets/user/assets/js/all.js')}}"></script>
<!-- Script For This Page Only -->
<script src="{{asset('assets/user/assets/js/confirm-number.js')}}"></script>
<!-- Main.Js -->
<script src="{{asset('assets/user/assets/js/main.js')}}"></script>
</body>

</html>


{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
