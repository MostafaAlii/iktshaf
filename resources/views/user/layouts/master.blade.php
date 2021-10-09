<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ============================================================== -->
    <!-- head -->
    <!-- ============================================================== -->
    @include('user.layouts.head')
    <!-- ============================================================== -->
    <!-- head End -->
    <!-- ============================================================== -->
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
                         calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite" />
            </rect>
            <rect x="30" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.25s" dur="1s"
                         values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite" />
            </rect>
            <rect x="60" width="15" height="140" rx="6">
                <animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120"
                         calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite" />
            </rect>
            <rect x="90" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.25s" dur="1s"
                         values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite" />
            </rect>
            <rect x="120" y="10" width="15" height="120" rx="6">
                <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120"
                         calcMode="linear" repeatCount="indefinite" />
                <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10"
                         calcMode="linear" repeatCount="indefinite" />
            </rect>
        </svg>
        <!-- Loader Text -->
        <!-- <p>لحظة من فضلك</p> -->
    </div>
</div>
<!-- =============================================================== -->
<!-- Loader End -->
<!-- =============================================================== -->

<!-- ============================================================== -->
<!-- Navbar -->
<!-- ============================================================== -->
@include('user.layouts.navbar')
<!-- ============================================================== -->
<!-- Navbar End -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- content -->
<!-- ============================================================== -->
@yield('content')
<!-- ============================================================== -->
<!-- content End -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
@include('user.layouts.footer')
<!-- ============================================================== -->
<!-- footer End -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- footer-scripts -->
<!-- ============================================================== -->
@include('user.layouts.footer-scripts')
<!-- ============================================================== -->
<!-- footer-scripts End -->
<!-- ============================================================== -->
</body>
</html>
