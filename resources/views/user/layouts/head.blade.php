
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iktshaf</title>
      <!-- link For link tag FavIcon -->
      <link rel="shortcut icon" href="{{URL::asset('attachments/siteIcon/'.$setting['site_icon'])}}">
      <!-- Bootstrap css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-3Wg4cUtDziGc50xL4PCr98iap+jlvY2rTTsQU5F2vcf+KROJydycFaCjmlZVA1oG" crossorigin="anonymous">
      <!-- Aos -->
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{url('assets/user/assets/css/all.min.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" href="{{url('assets/user/assets/css/style.css')}}">
      @yield('css')
</head>

<body style="background-color: #fff;">
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
      
