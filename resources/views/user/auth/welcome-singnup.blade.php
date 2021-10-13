@extends('user.layouts.master')

@section('content')
    <!-- =============================================================== -->
    <!-- Welcome Sign page Start -->
    <!-- =============================================================== -->
    <div class="container sign-up-container welcome-message-container">
        <div class="row" data-aos="zoom-in">
            <div class="col-12">
                <div class="form-wrapper">
                    <form class="row justify-content-center w-100 mx-0 needs-validation" novalidate>
                        <div class="col-12 my-4 text-center">
                            <h5>
                                أهلا بك معنا
                                <br>
                                <br>
                                أنت الآن جاهز للبدء مع (اكتشاف)
                            </h5>
                        </div>
                        <div class="text-center">
                            <a href="{{url('/')}}">
                                <button type="button" class="btn btn-primary px-5 py-3">
                                    هيا بنا
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- =============================================================== -->
    <!-- Welcome Sign page End -->
    <!-- =============================================================== -->
@endsection
