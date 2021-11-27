<!-- =============================================================== -->
<!-- Footer -->
<!-- =============================================================== -->
<footer>
    <div class="container">
        <!-- Return Buttons -->
        <div class="return-to-top" onclick="topFunction()">
            <a class="text-reset text-decoration-none">
                <p>عودة للأعلي</p>
            </a>
        </div>
        <!-- Three Sections -->
        <div class="row three-sections">
            <div class="col-lg-6 col-md-7 col-12">
                <p class="footer-para">
                    برنامج " اكتشاف" هو الأول من نوعه في العالم العربي حيث يساعدك على اختيار مسارك بعد الثانوية عبر معرفة ميولك وقدراتك واكتشاف الفرص المتاحة. البرنامج تحت إدارة مؤسسة (خبراء المهنة)
                </p>
            </div>
            <div class="col-lg-4 col-md-5 col-12 d-flex">
                <div class="list-group footer-menu">
                    <a href="#" class="list-group-item list-group-item-action">من نحن</a>
                    <a href="#" class="list-group-item list-group-item-action">لماذا الموقع؟</a>
                    <a href="#" class="list-group-item list-group-item-action">الأساس العلمي للبرنامج</a>
                    <a href="#" class="list-group-item list-group-item-action">قصص نجاح</a>
                </div>
                <div class="list-group footer-menu">
                    <a href="#" class="list-group-item list-group-item-action" >سياسة الخصوصية</a>
                    <a href="#" class="list-group-item list-group-item-action">إتفاقية الإستخدام</a>
                    <a href="#" class="list-group-item list-group-item-action">خريطة الموقع</a>
                </div>

            </div>
            <div class="col-lg-2 d-lg-block d-none footer-social">
                <div class="row row-cols-2 g-3 align-items-start">
                    <a href="{{ setting()->facebook_link }}">
                        <img src="{{url('assets/user/assets/images/facebook.png')}}" alt="...">
                    </a>
                    <a href="{{ setting()->twitter_link }}">
                        <img src="{{url('assets/user/assets/images/twitter.png')}}" alt="...">
                    </a>
                    <a href="{{ setting()->linkedIn_link }}">
                        <img src="{{url('assets/user/assets/images/linkedin.png')}}" alt="...">
                    </a>
                    <a href="{{ setting()->instgram_link }}">
                        <img src="{{url('assets/user/assets/images/instagram.png')}}" alt="...">
                    </a>
                </div>
                <div class="d-flex">

                </div>
            </div>
        </div>
    </div>
</footer>
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
<script src="{{url('assets/user/assets/js/all.js')}}"></script>
<!-- Main.Js -->
<script src="{{url('assets/user/assets/js/main.js')}}"></script>

@yield('js')
<!-- =============================================================== -->
<!-- Footer End -->
<!-- =============================================================== -->
</body>

</html>