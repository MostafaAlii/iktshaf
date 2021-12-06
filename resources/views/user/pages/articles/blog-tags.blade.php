@extends('user.layouts.master')

@section('content')

<script
type="text/javascript"
src="https://platform-api.sharethis.com/js/sharethis.js#property=5c250c96d02b6e0010eca37d&product=sop"
async="async"
></script>
<style>
    .activeLike{color: red}
    .fa-heart{
        color: #f60;
    }
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
                        <div class="login-steps {{url()->current()==url('blog') ?'active':'' }}">
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
                        <div class="login-steps {{url()->current()==url('blog-life') ?'active':'' }}">
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
                    <div class="login-steps {{url()->current()==url('blog-writers') ?'active':'' }}">
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
        @if($tag->count() > 0)
            @foreach($tag as $article)
            @php
            $nLike=App\Models\Like::where('article_id',$article->id)->get()->sum("like");
            @endphp
            @auth
            @php
            $usr_Like=App\Models\Like::where('user_id',Auth::user()->id)->where('article_id',$article->id)->get()->sum("like");
            @endphp
            @endauth
              <!-- Card -->
                <div class="col">
                    <a href="{{route('single.article.page', $article->id)}}" class="text-reset text-decoration-none">
                    <div class="card blog-item">
                        <img src="{{asset('storage/' . $article->photo )}}" class="card-img-top" alt="...">
                        <div class="card-body p-0">
                            <div class="px-3 pt-3">
                                <div class="d-flex align-items-center">
                                    <div class="image-wrapper mb-2">
                                        @if (!empty($article->admin->photo))
                                        <img src="{{ asset('storage/' . $article->admin->photo )}}" alt="...">
                                        @else
                                        <img src="{{url('assets/user/assets/images/avatar3.png')}}" alt="...">
                                        @endif
                                    </div>
                                    <div class="text-wrapper ps-3">
                                        <h6 text-right>
                                            {{ $article->admin->name }}
                                        </h6>
                                        <p>
                                            <a href="{{route('single.article.page', $article->id)}}" class="text-reset text-decoration-none h4">{{$article->title}}</a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </a>
                           <!-- Start Action -->
                                <div class="actions">
                                    <!-- Start Share Btn -->
                                    <div class="single-action">
                                        <div class="icon">
                                            <div class="st-custom-button" onclick="share({{$article->id}})" data-url="{{route('single.article.page', $article->id)}}" data-title="{{$article->title}}" data-image="{{asset('storage/' . $article->photo )}}" data-network="facebook">
                                            <i class=" fas fa-share-alt"></i>
                                            </div>
                                        </div>
                                        <div class="numbers"  id="num_share{{$article->id}}">
                                            {{empty($article->share)?'0':$article->share}}
                                        </div>
                                    </div>

                                    <!-- End Share Btn -->
                                <!-- Start Like Btn -->
                                <div class="single-action">
                                    <div class="icon">
                                        @auth
                                        <a class=" text-reset text-decoration-none" href="javascript:void(0)" onclick="like({{$article->id}})">
                                        <i id="heart{{$article->id}}" class="{{$usr_Like > 0 ? 'fas fa-heart':'far fa-heart'}}"></i></a></div>
                                        @else
                                        <a  class="text-reset text-decoration-none" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <i id="heart{{$article->id}}" class="far fa-heart"></i></a></div>
                                        @endauth
                                    <div class="numbers" id="num_like{{$article->id}}">
                                        {{ empty($nLike)? '0': $nLike}}
                                    </div>
                                </div>
                                <!-- End Like Btn -->
                                <!-- Start View Btn -->
                                <div class="single-action">
                                    <div class="icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="numbers">
                                        {{ $article->views }}
                                    </div>
                                </div>
                                <!-- End View Btn -->
                            </div>
                            <!-- End Action -->
                        </div>
                    </div>
                </div>
            <!-- Card -->
            @endforeach
        @else
            <div class="text-center text-danger">
                  عفوا ﻻ توجد مقاﻻت حتى اﻻن
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

<script>
    function share(id){
    $.ajax({
    type: "post",
    url: "{{url('blog/share')}}",
    data: {
        _token: '{{ csrf_token() }}',
        id: id
          },
    success: function(data) {
     if(data.status == true){
        $('#num_share'+id).replaceWith($('#num_share'+id).html(data.numShare));
     }
    },error: function(data) {
        }
    });
}
</script>
@endsection
