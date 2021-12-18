@extends('user.layouts.master')
@section('content')
@php

    $colers=['#23B9E2','#4EE223','#E22350','#E223C8','#902428','#2923E2'];
    $arrn=['أولاً','ثانياً','ثالثاً','رابعاً','خامساً','سادساً','سابعاً','ثامناً','تاسعاً'];

@endphp


    <!-- =============================================================== -->
    <!-- Welcome Sign page Start -->
    <!-- =============================================================== -->
    <div class="exam-third-step exam2-4thStep">
        <div class="container">
            <!-- Title  & Indicator -->
            <div class="row mb-4 pt-5 justify-content-center">
                <!-- Title -->
                <div class="col-md-12 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{url('assets/user/assets/images/exam21.png')}}" alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        {{ $Pattern->title}}
                    </h4>

                </div>
                <!-- Content -->
                <div class="col-12 my-5">
                    <h3 class="fw-bold site-move">
                        <span class="fw-normal">الاسم :</span> {{ Auth::user()->name}} .
                    </h3>
                    <h3 class="fw-bold site-move">
                        <span class="fw-normal">تاريخ أخذ المقياس :</span>{{ $answer->created_at->format('d/m/Y')}} .
                    </h3>
                    <!-- Title -->
                    <div class="title-wrapper mt-5">
                        <h4 class="fw-bold">
                            ما هو ميولك المهني؟
                        </h4>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-4 mt-5">
                            يُظهر المقياس أنك تمتلك القدرات التالية
                        </h4>
                        <h4 class="site-move fw-bold">
                            القدرات اللغوية والقدرات البصرية المكانية
                        </h4>
                    </div>
                    <div>
                    @foreach ($colects as $key=>$colle)
                    @php
                    $question=$colle->question->toArray();
                    $num=$colle->answer->where('user_id',\Auth::user()->id)->count();
                    $colle_answer=$colle->answer->where('user_id',\Auth::user()->id)->sum('answer_degree');
                    $max=App\Models\Answer::whereIn('question_id',$question)->max('degree');
                    $num_hand=$num*$max;
                    $num=$colle_answer/$num_hand*100;
                    $passing=$colle->test->passing;
                    @endphp
                   @if($colle_answer>=$passing)
                    <div class="custom-progress">
                        <h5 class="fw-bold">
                            {{$colle->name}}
                        </h5>
                        <div class="d-flex align-items-center">
                            <div class="col-11">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar"  style="width: {{$num}}% ; background-color:{{ $colers[$key] }} !important; " aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div>
                                <h6 class="m-1 fw-bold h5">
                                    {{$colle_answer}}
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    </div>
                    <!-- Title -->
                    <div class="title-wrapper mt-5">
                        <h4 class="fw-bold">
                            تعرف أكثر على ميولك
                        </h4>
                    </div>
                    @foreach($tests as $key=> $tes)
                    @php
                    $colects = app\Models\Collection::with('answer')->where('test_id',$tes->id)->get();
                    @endphp
                    <h3 class="fw-bold site-move mt-5">
                        {{ $arrn[$key] }} / {{ $tes->test }}:
                    </h3>
                    @foreach ($colects as $key=>$colle)
                    @php
                    $question=$colle->question->toArray();
                    $num=$colle->answer->where('user_id',\Auth::user()->id)->count();
                    $colle_answer=$colle->answer->where('user_id',\Auth::user()->id)->sum('answer_degree');
                    $max=App\Models\Answer::whereIn('question_id',$question)->max('degree');
                    $num_hand=$num*$max;
                    $num=$colle_answer/$num_hand*100;
                    $passing=$colle->test->passing;
                    @endphp
                   @if($colle_answer>=$passing)
                   <div class="single-miol">
                    <div>
                        <div class="img">
                            <img src="{{url('assets/user/assets/images/check-pink.png')}}" alt="...">
                        </div>
                        <div class="text">
                            <h3>
                               {{ $colle->mission }}
                            </h3>
                        </div>
                    </div>
                </div>
                   @endif
                   @endforeach
                    @endforeach
                    </div>
                    <!-- Title -->
                    <div class="title-wrapper mt-5">
                        <h4 class="fw-bold">
                            ما التخصصات والدبلومات المناسبة لميولك؟
                        </h4>
                    </div>
                    @foreach($tests as $key=> $tes)
                    @php
                    $colects = app\Models\Collection::with('answer')->where('test_id',$tes->id)->get();
                    @endphp
                     <h3 class="fw-bold site-move mt-5">
                        {{ $arrn[$key] }} / {{ $tes->test }}:
                    </h3>
                    @foreach ($colects as $key=>$colle)
                    @php
                    $question=$colle->question->toArray();
                    $num=$colle->answer->where('user_id',\Auth::user()->id)->count();
                    $colle_answer=$colle->answer->where('user_id',\Auth::user()->id)->sum('answer_degree');
                    $max=App\Models\Answer::whereIn('question_id',$question)->max('degree');
                    $num_hand=$num*$max;
                    $num=$colle_answer/$num_hand*100;
                    $passing=$colle->test->passing;
                    @endphp
                   @if($colle_answer>=$passing)

                   <div class="single-miol-2">
                    <div>
                        <div class="img">
                            <img src="{{url('assets/user/assets/images/star.png')}}" alt="...">
                        </div>
                        <div class="text">
                            <h3>
                                {{ $colle->specialty }}
                            </h3>
                        </div>
                    </div>
                </div>
                   @endif
                   @endforeach
                    @endforeach

                </div>
                <!-- Buttons -->
                <div class="col-12 my-5 text-center">
                    <a href="#" class="btn text-black btn-lg py-4 px-5" style="background: #FFCC00;">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">
                                اطلع من هنا على التقرير الكامل الخاص بك
                            </h5>
                            <div>
                                <h3 class="mb-0 ms-4">
                                    <i class="fas fa-download"></i>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 text-center two-bottom-buttons">
                    <div class="row justify-content-center">
                        <a href="{{url('/questions')}}" class="btn btn-primary">
                            <img src="{{url('assets/user/assets/images/thinking.png')}}" alt="...">
                            <h3>
                                خذ مقياس القدرات
                            </h3>
                        </a>
                        <a href="{{url('/')}}" class="btn btn-primary">
                            <img src="{{url('assets/user/assets/images/home.png')}}" alt="...">
                            <h3>
                                الصفحة الرئيسية
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =============================================================== -->
    <!-- Welcome Sign page End -->
    <!-- =============================================================== -->

    <div class="py-5"></div>
@endsection

