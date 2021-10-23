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
        <div class="col-4">
            <a class="text-reset text-decoration-none" href="#">
                <div class="login-steps active">
                    <div class="row text-center">
                        <div class="text col-12 col-md-auto">
                            تخصصات مميزة
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a class="text-reset text-decoration-none" href="#">
                <div class="login-steps">
                    <div class="row text-center">
                        <div class="text col-12">
                            الحياة الجامعية
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-4">
            <a class="text-reset text-decoration-none" href="#">
                <div class="login-steps">
                    <div class="row text-center">
                        <div class="text col-12">
                            الكتّاب المشاركون
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row" data-aos="zoom-in">
        <div class="col my-4">
            <h5>
                مقالات حول تخصصات مميزة
            </h5>
        </div>
    </div>
    <div class="row cards-row justify-content-center" data-aos="zoom-in">
        <!-- Card -->
        @if($articles->count() > 0)
            @foreach($articles as $article)
            @php                
            $nLike=App\Models\Like::where('article_id',$article->id)->get()->sum("like");               
            @endphp
            @auth 
            @php  
            $usr_Like=App\Models\Like::where('user_id',Auth::user()->id)->where('article_id',$article->id)->get()->sum("like");            
            @endphp
            @endauth  
                <div class="col">
                    <div class="card blog-item">
                        <img src="{{asset('storage/' . $article->photo )}}" class="card-img-top" alt="...">
                        <div class="card-body p-0">
                            <div class="px-3 pt-3">
                                <div class="d-flex align-items-center">
                                    <div class="image-wrapper mb-2">
                                        <img src="{{ asset('storage/' . $article->admin->photo )}}" alt="...">
                                    </div>
                                    <div class="text-wrapper ps-3">
                                        <h6>
                                            {{ $article->admin->name }}
                                        </h6>
                                        <p>
                                            {{ $article->title }}
                                        </p>
                                    </div>
                                </div>
                                <h5 class="card-title text-truncate mt-4 mb-5"><a href="{{route('single.article.page', $article->id)}}" class="text-reset text-decoration-none">{{ trim_content($article->description,25) }}</a></h5>
                                <div class="row branches">
                                    <div class="col-6">
                                        <div>
                                            الطب البشري   
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            الطب البشري   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Action -->
                            <div class="actions">
                                <!-- Start Share Btn -->
                                <div class="single-action">
                                    <div class="icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <div class="numbers">
                                        105
                                    </div>
                                </div>
                                <!-- End Share Btn -->
                                <!-- Start Like Btn -->
                                <div class="single-action">
                                    <div class="icon">   
                                        @auth
                                        <a href="javascript:void(0)" onclick="like({{$article->id}})">
                                        <i id="heart{{$article->id}}" class="{{$usr_Like > 0 ? 'fas fa-heart':'far fa-heart'}}"></i></a></div>
                                        @else
                                        <a href="javascript:void(0)">
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
@endsection
