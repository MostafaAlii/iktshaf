<!-- =============================================================== -->
<!-- Navbar -->
<!-- =============================================================== -->
<!-- Desktop Navbar -->
<div id="navbar-wrapper" class="d-lg-block d-none">
    <div class="top">
        <div class="container d-flex align-items-center" style="height: 73px;">
            <div class="login-user-settings">
                @auth
                    <div class="logined-user-image">
                        @if (!empty(Auth::user()->photo))                            
                        <img src="{{asset(Auth::user()->photo). '.png'}}" alt="...">
                        @else
                        <img src="{{url('assets/user/assets/images/avatar3.png')}}" alt="...">
                        @endif
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1u1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1u1">
                            <li><a class="dropdown-item" href="{{route('profileUser')}}">الملف الشخصي</a></li>
                            <hr class="mx-2">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="bx bx-log-out">تسجيل الخروج</i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1u2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-heart"></i>
                            مفضلتي
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1u2">
                            <li><a class="dropdown-item" href="#">منشوراتي</a></li>
                            <hr class="mx-2">
                            <li><a class="dropdown-item" href="#">مفضلتي من الجامعات والكليات</a></li>
                            <hr class="mx-2">
                            <li><a class="dropdown-item" href="#">مفضلتي من المقالات</a></li>
                            <hr class="mx-2">
                            <li><a class="dropdown-item" href="#">مفضلتي من التخصصات والدبلومات</a></li>
                        </ul>
                    </div>
                @else
                    <a class="btn btn-primary rounded-pill me-3 px-4" href="{{route('ourServices')}}">سجل في اكتشاف</a>
                    <a class="btn btn-outline-primary rounded-pill px-4" data-bs-toggle="modal"
                       data-bs-target="#loginModal">تسجيل الدخول</a>
                @endauth
            </div>
            <div class="ms-auto social-wrapper">
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="logo-mirror">

            </div>
        </div>
    </div>
    <div class="bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ourServices')}}">خدمات إكتشاف</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('articlesBlog')}}">المدونة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> شهادة (CYY) للمرشدين </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المدارس المشاركة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">من نحن ؟</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-wrapper">
                    <a class="navbar-brand m-0" href="#">
                        <img src="{{url('assets/user/assets/images/logo.png')}}" alt="...">
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Mobile Navbar -->
<div id="mobile-navbar-wrapper" class="d-lg-none">
    <div class="container h-100">
        <div class="d-flex align-items-center h-100">
            <!-- Icon -->
            <div class="icon">
                <a class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                   aria-controls="offcanvasRight">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <!-- Social -->
            <div class="social ms-auto">
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <div>
                    <a class="text-reset" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <!-- Logo -->
            <div class="logo text-center">
                <div>
                    <img src="{{url('assets/user/assets/images/logo.png')}}" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Sidemenu Canvas -->
<div class="offcanvas offcanvas-start p-0" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header fixed-top">
        <!-- <h5 id="offcanvasRightLabel"></h5> -->
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <!-- when user login -->
        <div class="top-user text-center">
            <div class="img">
                <img src="{{url('assets/user/assets/images/user.jpg')}}" alt="...">
            </div>
            <p class="name">
                محمد أحمد
            </p>
            <!-- If Not Login add this button -->
            <a href="#" class="btn btn-outline-primary orange">
                عضو في اكتشاف ؟ ... سجل دخولك
            </a>
        </div>
        <!-- links -->
        <div class="links-wrapper">
            <div class="dropdown">
                <div class="menu-item">
                    <a class=" menu-link text-reset text-decoration-none w-100 dropdown-toggle" id="dropdownMenuButton1"
                       data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-icon me-3">
                                <i class="far fa-heart"></i>
                            </span>
                        مفضلتي
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">مفضلتي من التخصصات و الدبلومات</a></li>
                        <li><a class="dropdown-item" href="#">مفضلتي من المقالات</a></li>
                        <li><a class="dropdown-item" href="#">مفضلتي من الجامعات و الكليات</a></li>
                        <li><a class="dropdown-item" href="#">منشوراتي</a></li>
                    </ul>
                </div>
            </div>
            <div class="menu-item">
                <a href="{{route('ourServices')}}" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-th-large"></i>
                        </span>
                    خدمات إكتشاف
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-notes-medical"></i>
                        </span>
                    المدونة
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-school"></i>
                        </span>
                    المدارس المشتركة
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-certificate"></i>
                        </span>
                    شهادات (CCY) للمرشدين
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                    من نحن
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                    اتصل بنا
                </a>
            </div>
            <div class="dropdown">
                <div class="menu-item">
                    <a class=" menu-link text-reset text-decoration-none w-100 dropdown-toggle"
                       id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-icon me-3">
                                <i class="fas fa-cog"></i>
                            </span>
                        الاعدادات
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton12">
                        <li><a class="dropdown-item" href="#">تغيير المعلومات الشخصية</a></li>
                        <li><a class="dropdown-item" href="#">تغيير كلمة السر</a></li>
                        <li><a class="dropdown-item" href="#">حذف الحساب</a></li>
                    </ul>
                </div>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link text-reset text-decoration-none w-100">
                        <span class="menu-icon me-3">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    تسجيل الخروج
                </a>
            </div>
            <!-- contact -->
            <div class="contact-header">
                <p>
                    تواصل معنا علي
                </p>
                <hr class="mb-4">
            </div>
            <div class="social-icons row g-2 justify-content-center">
                <div class="col-auto">
                    <a class="social-icon" href="#">
                        <div style="background-color: #4D67A0;">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </a>
                </div>
                <div class="col-auto">
                    <a class="social-icon" href="#">
                        <div style="background-color: #0077B5;">
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                    </a>
                </div>
                <div class="col-auto">
                    <a class="social-icon" href="#">
                        <div style="background-color: #67C15E;">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                    </a>
                </div>
                <div class="col-auto">
                    <a class="social-icon" href="#">
                        <div style="background-color: #03A9F4;">
                            <i class="fab fa-twitter"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =============================================================== -->
<!-- Navbar End -->
<!-- =============================================================== -->

@include('user.auth.loginForm')
