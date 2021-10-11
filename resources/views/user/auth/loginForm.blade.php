<!-- =============================================================== -->
<!-- Login Modal -->
<!-- =============================================================== -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">تسجيل الدخول</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sign-up-container login-container mb-0">
                    <div class="row" data-aos="zoom-in">
                        <div class="col-12">
                            <div class="form-wrapper" style="box-shadow: unset;">
                                <form class="row needs-validation" method="POST" action="{{ route('login') }}"
                                      novalidate>
                                    @csrf
                                    <div class="col-md-12 mb-2 position-relative">
                                        <div class="site-input">
                                            <label for="validationTooltip11M" class="form-label">
                                                البريد الاكتروني
                                            </label>
                                            <div class="input-gr-cus">
                                                <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon11M">
                                                            <i class="far fa-envelope-open"></i>
                                                        </span>
                                                    <input placeholder="البريد الإلكتروني \ رقم الهاتف"
                                                           style="direction: rtl;" type="text" class="form-control"
                                                           id="validationTooltip11M" aria-describedby="basic-addon11M"
                                                           name="email"
                                                           required>
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
                                    <div class="col-md-12 mb-2 position-relative">
                                        <div class="site-input">
                                            <label for="validationTooltip12M" class="form-label">
                                                كلمة المرور
                                            </label>
                                            <div class="input-gr-cus">
                                                <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon12M">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                    <input placeholder="********"
                                                           type="password" class="form-control"
                                                           id="validationTooltip12M" aria-describedby="basic-addon12M"
                                                           name="password"
                                                           required>
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
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary px-5 py-3 mb-0" type="submit">
                                            تسجيل
                                        </button>
                                        <br>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                               class="text-reset text-decoration-none mt-2">
                                                هل نسيت كلمة المرور
                                            </a>
                                        @endif
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
<!-- Login Modal End -->
<!-- =============================================================== -->
