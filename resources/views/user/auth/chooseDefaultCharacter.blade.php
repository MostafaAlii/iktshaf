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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-3Wg4cUtDziGc50xL4PCr98iap+jlvY2rTTsQU5F2vcf+KROJydycFaCjmlZVA1oG" crossorigin="anonymous">
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

<!-- =============================================================== -->
<!-- Welcome Sign page Start -->
<!-- =============================================================== -->
<div class="container py-4 sign-up-container welcome-message-container avatar-container" style="height: 100vh; max-width: 800px; margin: 0 auto;">
    <div class="row h-100 align-items-center" data-aos="zoom-in">
        <div class="col-12">
            <div class="form-wrapper">
                <form method="post" action="{{route('saveAvatar')}}" class="row justify-content-center w-100 mx-0" novalidate>
                    @csrf
                    <div class="col-12 my-4 text-center">
                        <h5 class="h4">
                            وقبل البدء، نود منك ان تختار صورة رمزية لك ستظهر في حسابك
                        </h5>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <input type="radio" class="btn-check" name="options" id="option1" value="avatar1" autocomplete="off">
                            <label class="btn select-avatar" for="option1">
                                <img class="avatar-image" src="{{asset('assets/user/assets/images/avatar1.png')}}" alt="...">
                            </label>

                            <input type="radio" class="btn-check" name="options" value="avatar2" id="option2" autocomplete="off">
                            <label class="btn select-avatar" for="option2">
                                <img class="avatar-image" src="{{asset('assets/user/assets/images/avatar2.png')}}" alt="...">
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="radio" class="btn-check" name="options" value="avatar3" id="option3" autocomplete="off">
                            <label class="btn select-avatar" for="option3">
                                <img class="avatar-image" src="{{asset('assets/user/assets/images/avatar3.png')}}" alt="...">
                            </label>

                            <input type="radio" class="btn-check" name="options" value="avatar4" id="option4" autocomplete="off">
                            <label class="btn select-avatar" for="option4">
                                <img class="avatar-image" src="{{asset('assets/user/assets/images/avatar4.png')}}" alt="...">
                            </label>
                        </div>

                    </div>
                    <div class="col-12 text-center after-select-avatar-text d-none">
                        <div class="">
                            <h5 class="h2 my-3">
                                احسنت
                            </h5>
                            <h5 class="h2 mb-3">
                                أنت الآن جاهز للبدء مع (اكتشاف)
                            </h5>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3">
                            هيا بنا
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- =============================================================== -->
<!-- Welcome Sign page End -->
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
<script>

    var divs = document.querySelectorAll('.select-avatar');

    for (i = 0; i < divs.length; ++i) {
        divs[i].onclick = function(event) {
            // console.log("s");
            document.querySelector('.after-select-avatar-text').classList.remove("d-none");
        }
    };

</script>
</body>

</html>
