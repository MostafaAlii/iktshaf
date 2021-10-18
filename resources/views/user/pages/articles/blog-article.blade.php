@extends('user.layouts.master')

@section('content')
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
                                {{--<p>{{ trim_content($article->description,25) }}</p>--}}
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
                            <div class="actions">
                                <div class="single-action">
                                    <div class="icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    <div class="numbers">
                                        105
                                    </div>
                                </div>
                                <div class="single-action">
                                    <div class="icon">
                                        <i class="far fa-heart"></i>
                                    </div>
                                    <div class="numbers">
                                        105
                                    </div>
                                </div>
                                <div class="single-action">
                                    <div class="icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="numbers">
                                        105
                                    </div>
                                </div>
                            </div>
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