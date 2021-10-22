@extends('user.layouts.master')
@section('content')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5c250c96d02b6e0010eca37d&product=inline-share-buttons' async='async'></script>
<div class="container blogs-details-container">
    <div class="row mt-5 mb-4" data-aos="zoom-in">
        <div class="col-12 header-wrapper">
            <h3 class="text-center mb-3 header-wrapper">
                {{ $article->title }}
            </h3>
        </div>
        <div class="col-12 writer-info-wrapper">
            <div>
                <div class="image">
                    <img src="{{ asset('storage/' . $article->admin->photo )}}" alt="...">
                </div>
                <div class="text">
                    <p class="mb-0 ms-2">
                        {{--<span>دكتور</span>--}}
                        {{ $article->admin->name }}
                        <br>
                        <span class="text-muted">
                            {{ $article->created_at }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 image-wrapper">
            <img class="w-100 rounded-1" src="{{asset('storage/' . $article->photo )}}" alt="...">           
        </div>
        <div class="col-12 actions-wrapper mb-4 mt-2">
            <div>
                <div class="text">
                    شارك
                </div>
              <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->                        
                
            </div>
        </div>
        <div class="col-12 text-wrapper">           
            {!!html_entity_decode($article->content)!!}
            <p class="text-black-50">
                {{ $article->description }}
            </p>
        </div>
        <div class="col-12 slogns-wrapper">
            <div>
                <div class="slogn">
                    {{ $article->tags }}
                </div>
            </div>
        </div>
        <!-- Blogs Comments -->
        <div class="col-12 cooments-section-wrapper">
            <div class="">
                <div class="" id="fbcomment">
                    <div class="body_comment">
                        <div class="row">
                            <div class="avatar_comment col-md-1">
                                <img src="{{asset('assets/user/assets/images/user.jpg')}}" alt="avatar"/>
                            </div>
                            <div class="box_comment col-md-11">
                                <textarea class="commentar" placeholder="اكتب تعليقك هنا ...."></textarea>
                                <div class="box_post">
                                    <div class="pull-left">
                                        <button class="btn btn-secondary px-4" onclick="submit_comment()" type="button" value="1">إرسال</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <ul id="list_comment" class="col-md-12">
                                <!-- Start List Comment 1 -->
                                <li class="box_result row">
                                    <div class="avatar_comment col-md-1">
                                        <img src="{{asset('assets/user/assets/images/user.jpg')}}" alt="avatar"/>
                                    </div>
                                    <div class="result_comment col-md-11">
                                        <h4>أريج احمد الصقور</h4>
                                        <p>
                                            هل اقدر اخذ هالتخصص واللغة ضعيفة ؟
                                        </p>
                                        <div class="tools_comment">
                                            <a class="like">اعجاب</a>
                                            <span aria-hidden="true"> · </span>
                                            <a class="replay">رد</a>
                                            <span aria-hidden="true"> · </span>
                                            <i class="far fa-heart"></i> <span class="count">1</span> 
                                            <span aria-hidden="true"> · </span>
                                            <span>منذ 26 دقيقة</span>
                                        </div>
                                        <ul class="child_replay">
                                            <li class="box_reply row">
                                                <div class="avatar_comment col-md-1">
                                                    <img src="{{asset('assets/user/assets/images/user.jpg')}}" alt="avatar"/>
                                                </div>
                                                 <div class="result_comment col-md-11">
                                                    <h4>أريج احمد الصقور</h4>
                                                    <p>
                                                        هل اقدر اخذ هالتخصص واللغة ضعيفة ؟
                                                    </p>
                                                    <div class="tools_comment">
                                                        <a class="like">اعجاب</a>
                                                        <span aria-hidden="true"> · </span>
                                                        <!-- <a class="replay">رد</a> -->
                                                        <!-- <span aria-hidden="true"> · </span> -->
                                                        <i class="far fa-heart"></i> <span class="count">1</span> 
                                                        <span aria-hidden="true"> · </span>
                                                        <span>منذ 26 دقيقة</span>
                                                    </div>
                                                    <ul class="child_replay"></ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <!-- Start List Comment 2 -->
                                <li class="box_result row admin-comment">
                                    <div class="avatar_comment col-md-1">
                                        <div class="position-relative" style="display: inline-block; border-radius:50%;">
                                            <img src="{{asset('assets/user/assets/images/user.jpg')}}" alt="avatar"/>
                                            <span class="position-absolute top-0  start-100 translate-middle badge rounded-pill bg-danger">
                                                +99
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="result_comment col-md-11">
                                        <h4>
                                            <img src="{{asset('assets/user/assets/images/mass.png')}}" alt="...">
                                            أريج احمد الصقور
                                            <p class="pos-badge text-white site-bg">
                                                مشرف محترف
                                            </p>
                                        </h4>
                                        
                                        <p>
                                            هل اقدر اخذ هالتخصص واللغة ضعيفة ؟
                                        </p>
                                        <div class="tools_comment">
                                            <a class="like">اعجاب</a>
                                            <span aria-hidden="true"> · </span>
                                            <a class="replay">رد</a>
                                            <span aria-hidden="true"> · </span>
                                            <i class="far fa-heart"></i> <span class="count">1</span> 
                                            <span aria-hidden="true"> · </span>
                                            <span>منذ 26 دقيقة</span>
                                        </div>
                                        <ul class="child_replay">
                                            <li class="box_reply row">
                                                <div class="avatar_comment col-md-1">
                                                    <img src="assets/images/user.jpg" alt="avatar"/>
                                                </div>
                                                 <div class="result_comment col-md-11">
                                                    <h4>أريج احمد الصقور</h4>
                                                    <p>
                                                        هل اقدر اخذ هالتخصص واللغة ضعيفة ؟
                                                    </p>
                                                    <div class="tools_comment">
                                                        <a class="like">اعجاب</a>
                                                        <span aria-hidden="true"> · </span>
                                                        <!-- <a class="replay">رد</a> -->
                                                        <span aria-hidden="true"> · </span>
                                                        <i class="far fa-heart"></i> <span class="count">1</span> 
                                                        <span aria-hidden="true"> · </span>
                                                        <span>منذ 26 دقيقة</span>
                                                    </div>
                                                    <ul class="child_replay"></ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <!-- <button class="show_more" type="button">Load 10 more comments</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()