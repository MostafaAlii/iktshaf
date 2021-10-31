@extends('user.layouts.master')

@section('content')
<style>
    .activeLike{color: red}
</style>
<div class="container blogs-specialties-container">
    <div class="row mt-5 mb-4" data-aos="zoom-in">
        <div class="col">
            <h3>
                المدونة
            </h3>
        </div>
    </div>
    <div class="row g-lg-5" data-aos="zoom-in">
                <!-- Start Department -->  
                <div class="col-4 ">
                    <a class="text-reset text-decoration-none" href="{{url('blog')}}">
                        <div class="login-steps ">
                            <div class="row text-center">
                                <div class="text col-12 col-md-auto">
                                    <!--تخصصات مميزة-->
                                    تخصصات مميزة
                                </div>
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="col-4 ">
                    <a class="text-reset text-decoration-none" href="{{url('blog-life')}}">
                        <div class="login-steps ">
                            <div class="row text-center">
                                <div class="text col-12 col-md-auto">                                  
                                    الحياة الجامعية
                                </div>
                            </div>
                        </div>
                    </a>
                </div>     
            <div class="col-4">
                <a class="text-reset text-decoration-none" href="{{url('blog-writers')}}">
                    <div class="login-steps active">
                        <div class="row text-center">
                            <div class="text col-12 col-md-auto">
                                الكتّاب المشاركون
                            </div>
                        </div>
                    </div>
                </a>
            </div>            
        <!-- End Department -->
    </div>
    <div class="row" data-aos="zoom-in">       
    </div>
    <div class="row cards-row justify-content-center" data-aos="zoom-in">
        <!-- Card -->
        @if($admins->count() > 0)
            @foreach($admins as $admin)   
            <!-- Card -->
            <div class="col">
                <div class="card writer-card-item blog-item">
                    <div class="card-body p-0">
                        <div class="px-3 pt-3">
                            <div class="my-4">
                                <div class="image-wrapper mb-2">
                                    @if (!empty($admin->photo))
                                    <img src="{{ asset('storage/' . $admin->photo )}}" alt="...">
                                    @else
                                    <img src="{{url('assets/user/assets/images/avatar3.png')}}" alt="...">
                                    @endif
                                </div>
                                <div class="text-wrapper">
                                    <h5 class="fw-bold">
                                        {{ $admin->name }}
                                    </h5>
                                    <p class="text-muted">
                                        {{ $admin->bio }} 
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-5 justify-content-center branches">
                                <div class="col-6">
                                    <div>
                                        الطب البشري   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="single-action">
                                <a href="#" class="text-reset text-decoration-none">
                                    <div class="icon">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="single-action">
                                <a href="#" class="text-reset text-decoration-none">
                                    <div class="icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="single-action">
                                <a href="#" class="text-reset text-decoration-none">
                                    <div class="icon">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="single-action">
                                <a href="#" class="text-reset text-decoration-none">
                                    <div class="icon">
                                        <i class="fab fa-linkedin-in"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            @endforeach
        @else
            <div class="text-center text-danger">
                  عفوا ﻻ كتاب حالياً 
            </div>
        @endif
    </div>
</div>
@endsection()
@section('js')
<script>
    function like(id){   
    $.ajax({
    type: "post",
    url: "{{url('blog/like')}}",
    data: {
        _token: '{{ csrf_token() }}',
        id: id
          },
    success: function(data) {
     if(data.status == true){
        $('#num_like'+id).replaceWith($('#num_like'+id).html(data.numLike));
        if(data.like_user > 0){
        $('#heart'+id).removeClass('far fa-heart');
        $('#heart'+id).addClass('fas fa-heart');
     }else{
         $('#heart'+id).removeClass('fas fa-heart');
        $('#heart'+id).addClass('far fa-heart');
        }
     }
    },error: function(data) {           
        }
    });
}
</script>
@endsection
