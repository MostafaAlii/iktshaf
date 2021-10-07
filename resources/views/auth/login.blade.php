<html lang="en" direction="rtl" dir="rtl" style="direction: rtl">
<!--begin::Head-->
<head>
    <base href="../">
    <title>Login</title>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" href="{{asset('assets/admin/media/logos/favicon.ico')}}"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">

        <div class="row form-control">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-header-stretch">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#loginUser">تسجيل دخول
                                        مستخدم</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#loginAdmin">تسجيل دخول ادمن</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="loginUser" role="tabpanel">
                                <x-guest-layout>
                                    <x-auth-card>
                                        <x-slot name="logo">
                                            <h3 class="nav-item"> تسجيل دخول مستخدم</h3>
                                        </x-slot>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                                        <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')"/>

                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                         :value="old('email')" required autofocus/>
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')"/>

                                                <x-input id="password" class="block mt-1 w-full"
                                                         type="password"
                                                         name="password"
                                                         required autocomplete="current-password"/>
                                            </div>

                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox"
                                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                           name="remember">
                                                    <span
                                                        class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                       href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-button class="ml-3">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </x-auth-card>
                                </x-guest-layout>
                            </div>

                            <div class="tab-pane fade" id="loginAdmin" role="tabpanel">
                                <x-guest-layout>
                                    <x-auth-card>
                                        <x-slot name="logo">
                                            <h3 class="nav-item"> تسجيل دخول ادمن</h3>
                                        </x-slot>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                                        <form method="POST" action="{{ route('loginAdmin') }}">
                                        @csrf

                                        <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')"/>

                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                         :value="old('email')" required autofocus/>
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-label for="password" :value="__('Password')"/>

                                                <x-input id="password" class="block mt-1 w-full"
                                                         type="password"
                                                         name="password"
                                                         required autocomplete="current-password"/>
                                            </div>

                                            <!-- Remember Me -->
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox"
                                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                           name="remember">
                                                    <span
                                                        class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                       href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-button class="ml-3">
                                                    {{ __('Log in') }}
                                                </x-button>
                                            </div>
                                        </form>
                                    </x-auth-card>
                                </x-guest-layout>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>var hostUrl = "assets/admin/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/admin/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/admin/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/admin/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('assets/admin/js/custom/modals/upgrade-plan.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
