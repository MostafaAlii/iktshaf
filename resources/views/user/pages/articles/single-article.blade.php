@extends('user.layouts.master')

@section('content')
    <div class="container blogs-details-container">
        @foreach($articles as $article)
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
                <div class="col-12 actions-wrapper mb-4">
                    <div>
                        <div class="text">
                            شارك
                        </div>
                        <div class="share-icon">
                            <a class="text-rest text-decoration-none" href="#">
                                <img src="{{asset('assets/user/assets/images/sh-t.png')}}" alt="...">
                            </a>
                        </div>
                        <div class="share-icon">
                            <a class="text-rest text-decoration-none" href="#">
                                <img src="{{asset('assets/user/assets/images/sh-w.png')}}" alt="...">
                            </a>
                        </div>
                        <div class="share-icon">
                            <a class="text-rest text-decoration-none" href="#">
                                <img src="{{asset('assets/user/assets/images/sh-linkin.png')}}" alt="...">
                            </a>
                        </div>
                        <div class="share-icon">
                            <a class="text-rest text-decoration-none" href="#">
                                <img src="{{asset('assets/user/assets/images/sh-f.png')}}" alt="...">
                            </a>
                        </div>
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
                            <div class="body_comment" id="load">
                                <div class="row">
                                    <div class="avatar_comment col-md-1">
                                        <img src="@if(Auth::user()) {{asset(Auth::user()->photo). '.png'}} @else {{asset('assets/user/assets/images/avatar1'). '.png'}} @endif" alt="avatar"/>
                                    </div>
                                    <div class="box_comment col-md-11">
                                        <form id="commentForm">
                                            @csrf
                                            <textarea placeholder="اكتب تعليقك هنا ...." name="comment" id="comment"
                                                      required></textarea>
                                            <input type="hidden" id="article_id" value="{{$article->id}}">
                                            <div class="box_post">
                                                <div class="pull-left">
                                                    <button class="btn btn-secondary px-4" id="buttonCommentForm"
                                                            onclick="islam()" type="button">إرسال
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul id="list_comment" class="col-md-12">
                                        @foreach($article->comments as $comment)
                                            @if (is_null($comment->parent))
                                                <li class="box_result row">
                                                    <div class="avatar_comment col-md-1">
                                                        <img src="{{asset($comment->user->photo.'.png')}}"
                                                             alt="avatar"/>
                                                    </div>
                                                    <div class="result_comment col-md-11">
                                                        <h4>{{$comment->user->name}}</h4>
                                                        <p>
                                                            {{$comment->comment}}
                                                        </p>
                                                        <div class="tools_comment">
                                                            <a class="like">اعجاب</a>
                                                            <span aria-hidden="true"> · </span>
                                                            <a class="replay" onclick="replay({{$comment->id}})">رد</a>
                                                            <span aria-hidden="true"> · </span>
                                                            <i class="far fa-heart"></i> <span class="count">1</span>
                                                            <span aria-hidden="true"> · </span>
                                                            <span>{{$comment->created_at}}</span>
                                                        </div>
                                                        <ul class="child_replay">
                                                            @foreach($article->comments as $parent)
                                                                @if($comment->id ===  $parent->parent && !empty($parent->parent) )
                                                                    <li class="box_reply row">
                                                                        <div class="avatar_comment col-md-1">
                                                                            <img
                                                                                src="{{asset($parent->user->photo . '.png')}}"
                                                                                alt="avatar"/>
                                                                        </div>
                                                                        <div class="result_comment col-md-11">
                                                                            <h4>{{$parent->user->name}}</h4>
                                                                            <p>
                                                                                {{$parent->comment}}
                                                                            </p>
                                                                            <div class="tools_comment">
                                                                                <a class="like">اعجاب</a>
                                                                                <span aria-hidden="true"> · </span>
                                                                                <!-- <a class="replay">رد</a> -->
                                                                                <!-- <span aria-hidden="true"> · </span> -->
                                                                                <i class="far fa-heart"></i> <span
                                                                                    class="count">1</span>
                                                                                <span aria-hidden="true"> · </span>
                                                                                <span>{{$parent->created_at}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')

    <script>
        function islam(){
            let comment = $("#comment").val();
            let article_id = $("#article_id").val();
            console.log("new comment 21");
            $.ajax({
                url: "{{route('saveComment')}}",
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    comment: comment,
                    article_id: article_id,

                }, success: function (response) {
                    console.log("new comment 31");
                    if (response) {
                        $("#load").load(window.location.href + " #load")
                        console.log("new comment 41");
                    }
                },
            });
        }

    </script>

    <script>
        function replay($comment_id) {
            let comment_id = $comment_id;

            $(document).ready(function () {
                $('#list_comment').on('click', '.replay', function (e) {
                    cancel_reply();

                    $current = $(this);
                    el = document.createElement('li');
                    el.className = "box_reply row for-comment";
                    el.innerHTML =
                        '<div class=\"col-md-12 reply_comment\">' +
                        '<div class=\"row\">' +
                        '<div class=\"avatar_comment col-md-1\">' +
                        
                        '<img src=\"@if(Auth::user()){{asset(Auth::user()->photo). '.png'}} @else{{asset('assets/user/assets/images/avatar1')}} @endif \" />' +
                        '</div>' +
                        '<div class=\"box_comment col-md-10\">' +
                        '<textarea class=\"comment_replay\" name="reComment" id="reComment" required placeholder=\"اكتب تعليقك هنا ...\"></textarea>' +
                        '<div class=\"box_post\">' +
                        '<div class=\"pull-left\">' +
                        '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">إلغاء</button>' +
                        '<button onclick=\"submit_reply(' + comment_id + ')\" type=\"button\" value=\"1\">رد</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $current.closest('li').find('.child_replay').prepend(el);
                });
            });
        }

        function submit_reply($comment_id) {

            let reComment = $("#reComment").val();
            let comment_id = $comment_id;

            $.ajax({
                url: "{{route('saveReComment')}}",
                type: 'POST',
                data: {
                    '_token': "{{csrf_token()}}",
                    reComment: reComment,
                    comment_id: comment_id,
                }, success: function (response) {
                    if (response) {
                        $("#load").load(window.location.href + " #load")
                    }
                },
            });
        }

        function cancel_reply() {
            $(".box_reply.for-comment").remove();
            $('.reply_comment').remove();
        }

    </script>
@endsection
