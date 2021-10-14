@extends('user.layouts.master')

@section('content')
<div class="container py-4 sign-up-container welcome-message-container avatar-container" style="height: 100vh; max-width: 800px; margin: 0 auto;">
    <div class="row h-100 align-items-center" data-aos="zoom-in">
        <div class="col-12">
            <div class="form-wrapper">
                <form class="row justify-content-center w-100 mx-0 needs-validation" method="POST" action="{{ url('/register') }}" novalidate>
                    <div class="col-12 my-4 text-center">
                        <h5 class="h4">
                            وقبل البدء، نود منك ان تختار صورة رمزية لك ستظهر في حسابك
                        </h5>
                    </div>
                    <!-- Start Avatar -->
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                            <label class="btn" for="option1">
                                <img class="avatar-image" name="photo" value="avatar1" src="{{asset('assets/user/assets/images/avatar/avatar1.png')}}" alt="...">
                            </label>
                        
                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                            <label class="btn" for="option2">
                                <img class="avatar-image" name="photo" value="avatar2" src="{{asset('assets/user/assets/images/avatar/avatar2.png')}}" alt="...">
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                            <label class="btn" for="option3">
                                <img class="avatar-image" name="photo" value="avatar2" src="{{asset('assets/user/assets/images/avatar/avatar4.png')}}" alt="...">
                            </label>

                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                            <label class="btn" for="option4">
                                <img class="avatar-image" name="photo" value="avatar4" src="{{asset('assets/user/assets/images/avatar/avatar4.png')}}" alt="...">
                            </label>
                        </div>
                    </div>
                    <!-- End Avatar -->
                    <div class="col-12 text-center">
                        <h5 class="h2 my-3">
                            احسنت
                        </h5>
                        <h5 class="h2 mb-3">
                            أنت الآن جاهز للبدء مع (اكتشاف)
                        </h5>
                    </div>
                    <div class="text-center">
                        <a href="{{url('/sign-up')}}" type="button" class="btn btn-primary px-5 py-3">
                            هيا بنا
                        </a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection