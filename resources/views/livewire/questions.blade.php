@if ($questions)

    <div class="container">
        <!-- Title -->
        <div class="row mb-4 pt-5 justify-content-center">
            <div class="col-12 d-flex align-items-center">
                <button wire:click="startCharactersTest">شخصية</button>
                <button wire:click="startInclinationsTest">ميول</button>
                <button wire:click="startSkillsTest">مهارات</button>
            </div>
        </div>
    </div>

@elseif($charactersTest)

    <div class="exam-first exam3-firstStep">
        <div class="container">
            <!-- Title -->
            <div class="row mb-4 pt-5 justify-content-center">
                <div class="col-12 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam31.png')}}"
                             alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        مستكشف تحديات المستقبل
                        <span class="fw-normal">
                            (WCE)
                        </span>
                    </h4>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <div class="full-wrapper" style="border-color: #FFCC00; background-color:#f5f5f5;">
                        <img src="{{asset('assets/user/assets/images/exam34.png')}}" alt="...">
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12 ">
                    <h5 class="py-3 mb-0 ps-3 text-white" style="background-color: #FFCC00;">
                        تعريف عن الاختبار
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="h5 exam-explanition">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                        تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                        الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. هذا النص هو
                        مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن
                        تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button wire:click="startCharactersQuestion" class="btn mt-4 btn-primary shadow  exam-fs-btn"
                            style="background:#003399; border-color:#003399;">إبدأ الاختبار
                    </button>
                </div>
            </div>
        </div>
    </div>

@elseif($inclinationsTest)

    <div class="exam-first">
        <div class="container">
            <!-- Title -->
            <div class="row mb-4 pt-5 justify-content-center">
                <div class="col-12 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam-ficon.png')}}"
                             alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        المقياس العربي للميول المهنية
                        <span class="fw-normal">
                            (ACIA)
                        </span>
                    </h4>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <div class="full-wrapper">
                        <img src="{{asset('assets/user/assets/images/lamb.png')}}" alt="...">
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12 ">
                    <h5 class="py-3 mb-0 ps-3 text-white" style="background-color: #00AAA0;">
                        تعريف عن الاختبار
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="h5 exam-explanition">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                        تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                        الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. هذا النص هو
                        مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن
                        تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button wire:click="startInclinationsQuestion" class="btn mt-4 btn-primary shadow  exam-fs-btn">إبدأ
                        الاختبار
                    </button>
                </div>
            </div>
        </div>
    </div>

@elseif($skillsTest)

    <div class="exam-first exam2-firstStep">
        <div class="container">
            <!-- Title -->
            <div class="row mb-4 pt-5 justify-content-center">
                <div class="col-12 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam21.png')}}"
                             alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        المقياس العربي للقدرات
                        <span class="fw-normal">
                            (AMIAS)
                        </span>
                    </h4>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <div class="full-wrapper">
                        <img src="{{asset('assets/user/assets/images/exam24.png')}}" alt="...">
                    </div>
                </div>
            </div>
            <!-- Row -->
            <div class="row">
                <div class="col-12 ">
                    <h5 class="py-3 mb-0 ps-3 text-white" style="background-color: #941CEB;">
                        تعريف عن الاختبار
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="h5 exam-explanition">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                        التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                        تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه
                        الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. هذا النص هو
                        مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن
                        تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button wire:click="startSkillsQuestion" class="btn mt-4 btn-primary shadow  exam-fs-btn"
                            style="background:#EB2AA1;">إبدأ
                        الاختبار
                    </button>
                </div>
            </div>
        </div>
    </div>

@elseif($charactersQuestion)

    <div class="exam-second-step exam3-secondStep">
        <div class="container">
            <!-- Title  & Indicator -->
            <div class="row mb-4 pt-5 justify-content-center">
                <!-- Title -->
                <div class="col-md-9 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam31.png')}}"
                             alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        مستكشف تحديات المستقبل
                        <span class="fw-normal">
                            (WCE)
                        </span>
                    </h4>
                </div>
                <!-- Indicator -->
                <div class="col-lg-3 my-2 text-center">
                    <div class="circle-progress">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__background"/>
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                            js-progress-bar"/>
                        </svg>
                        <div class="text">
                            70
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="row my-3 pagination-ex">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-lg btn-primary first {{$counter <= 0 ? 'd-none' : ''}}"
                                wire:click="backQuestion">
                            <span class="h3">{{$counter}}</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-primary second" disabled>
                            <span class="h3">{{$counter + 1}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sub Title -->
            <div class="row">
                <div class="col-12">
                    <h5 class="text-black fw-bold mb-4">
                        الى أي درجة تستمع بهذا العمل أو النشاط؟
                    </h5>
                </div>
            </div>
            <!-- Questation -->
            <div class="row" data-aos="fade-left" data-aos-delay="1000">
                <div class="col-12">
                    <div class="questation">
                        <h3 class="mb-0">
                            {{$data[0]->questions[$counter]->question}}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Answer Box -->
            <div class="row" data-aos="fade-up" data-aos-delay="1000">
                <div class="col-12">
                    <div class="answers-wrapper">
                        <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">

                            @foreach($data[0]->questions[$counter]->answers as $index=>$answer)
                                <input type="radio" class="btn-check" name="answer_id" value="{{$answer->id}}"
                                       id="btnradio{{$index + 1}}" autocomplete="off">
                                {{--                                <input type="hidden" name="question_id" value="{{$data[0]->questions[0]->id}}" id="btnradio{{$index + 1}}" autocomplete="off">--}}
                                <label class="btn btn-outline-primary single-answer" for="btnradio{{$index + 1}}">
                                    <div wire:click="nextQuestion({{$data[0]->id}}, {{$answer->question_id}}, {{$answer->id}})">
                                        <img src="{{asset('assets/user/assets/images/answerImage.png')}}" alt="...">
                                        <div class="text-in-btn">
                                            {{$answer->answer}}
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>

@elseif($inclinationsQuestion)

    <div class="exam-second-step">
        <div class="container">
            <!-- Title  & Indicator -->
            <div class="row mb-4 pt-5 justify-content-center">
                <!-- Title -->
                <div class="col-md-9 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam-ficon.png')}}"
                             alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        المقياس العربي للميول المهنية
                        <span class="fw-normal">
                            (ACIA)
                        </span>
                    </h4>
                </div>
                <!-- Indicator -->
                <div class="col-lg-3 my-2 text-center">
                    <div class="circle-progress">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__background"/>
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                            js-progress-bar"/>
                        </svg>
                        <div class="text">
                            70
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="row my-3 pagination-ex">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-lg btn-primary first {{$counter <= 0 ? 'd-none' : ''}}"
                                wire:click="backQuestion">
                            <span class="h3">{{$counter}}</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-primary second" disabled>
                            <span class="h3">{{$counter + 1}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sub Title -->
            <div class="row">
                <div class="col-12">
                    <h5 class="text-black fw-bold mb-4">
                        الى أي درجة تستمع بهذا العمل أو النشاط؟
                    </h5>
                </div>
            </div>
            <!-- Questation -->
            <div class="row" data-aos="fade-left" data-aos-delay="1000">
                <div class="col-12">
                    <div class="questation">
                        <h3 class="mb-0">
                            {{$data[0]->questions[$counter]->question}}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Answer Box -->
            <div class="row" data-aos="fade-up" data-aos-delay="1000">
                <div class="col-12">
                    <div class="answers-wrapper">
                        <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
                            @foreach($data[0]->questions[$counter]->answers as $index=>$answer)
                                <input type="radio" class="btn-check" name="answer_id" value="{{$answer->id}}"
                                       id="btnradio{{$index + 1}}" autocomplete="off">

                                {{--                                <input type="hidden" name="question_id" value="{{$data[0]->questions[0]->id}}" id="btnradio{{$index + 1}}" autocomplete="off">--}}

                                <label class="btn btn-outline-primary single-answer" for="btnradio{{$index + 1}}">
                                    <div wire:click="nextQuestion({{$data[0]->id}}, {{$answer->question_id}},{{$answer->id}})">
                                        <img src="{{asset('assets/user/assets/images/answerImage.png')}}" alt="...">
                                        <div class="text-in-btn">
                                            {{$answer->answer}}
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>

@elseif($startSkillsQuestion)

    <div class="exam-second-step exam2-secondStep">
        <div class="container">
            <!-- Title  & Indicator -->
            <div class="row mb-4 pt-5 justify-content-center">
                <!-- Title -->
                <div class="col-md-9 d-flex align-items-center">
                    <div>
                        <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam21.png')}}" alt="...">
                    </div>
                    <h4 class="fw-bold mb-0 ps-2">
                        المقياس العربي للقدرات
                        <span class="fw-normal">
                            (AMIAS)
                        </span>
                    </h4>
                </div>
                <!-- Indicator -->
                <div class="col-lg-3 my-2 text-center">
                    <div class="circle-progress">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__background"/>
                            <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                            js-progress-bar"/>
                        </svg>
                        <div class="text">
                            70
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="row my-3 pagination-ex">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-lg btn-primary first {{$counter <= 0 ? 'd-none' : ''}}"
                                wire:click="backQuestion">
                            <span class="h3">{{$counter}}</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-primary second" disabled>
                            <span class="h3">{{$counter + 1}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sub Title -->
            <div class="row">
                <div class="col-12">
                    <h5 class="text-black fw-bold mb-4">
                        الى أي درجة تستمع بهذا العمل أو النشاط؟
                    </h5>
                </div>
            </div>
            <!-- Questation -->
            <div class="row" data-aos="fade-left" data-aos-delay="1000">
                <div class="col-12">
                    <div class="questation">
                        <h3 class="mb-0">
                            {{$data[0]->questions[$counter]->question}}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Answer Box -->
            <div class="row" data-aos="fade-up" data-aos-delay="1000">
                <div class="col-12">
                    <div class="answers-wrapper">
                        <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
                            @foreach($data[0]->questions[$counter]->answers as $index=>$answer)
                                <input type="radio" class="btn-check" name="answer_id" value="{{$answer->id}}"
                                       id="btnradio{{$index + 1}}" autocomplete="off">

                                {{--                                <input type="hidden" name="question_id" value="{{$data[0]->questions[0]->id}}" id="btnradio{{$index + 1}}" autocomplete="off">--}}

                                <label class="btn btn-outline-primary single-answer" for="btnradio{{$index + 1}}">
                                    <div wire:click="nextQuestion({{$data[0]->id}}, {{$answer->question_id}},{{$answer->id}})">
                                        <img src="{{asset('assets/user/assets/images/answerImage.png')}}" alt="...">
                                        <div class="text-in-btn">
                                            {{$answer->answer}}
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>

@endif
@if($inclinationsreport)
<div class="exam-second-step">
    <div class="container">
        <!-- Title  & Indicator -->
        <div class="row mb-4 pt-5 justify-content-center">
            <!-- Title -->
            <div class="col-md-9 d-flex align-items-center">
                <div>
                    <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam-ficon.png')}}" alt="...">
                </div>
                <h4 class="fw-bold mb-0 ps-2">
                    المقياس العربي للميول المهنية
                    <span class="fw-normal">
                        (ACIA)
                    </span>
                </h4>
            </div>
            <!-- Indicator -->
            <div class="col-lg-3 my-2 text-center">
                <div class="circle-progress">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                        js-progress-bar" />
                    </svg>
                    <div class="text">
                        70
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="row" data-aos="fade-left" data-aos-delay="1000">
            <div class="col-12">
                <div class="questation">
                    <h3 class="mb-0">
                        لقد انتهيت من المقياس كاملاً والآن اختر نوع التقرير الذي تحتاجه
                    </h3>
                </div>
            </div>
        </div>
        <!-- Answer Box -->
        <div class="row" data-aos="fade-up" data-aos-delay="1000">
            <div class="col-12">
                <div class="answers-wrapper">
                    <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio1">
                            <div>
                                <div class="text-in-btn">
                                    تقرير شامل
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio2">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار العلمي
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio3">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار الأدبي
                                </div>
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5"></div>

@elseif($charactersreport)

<div class="exam-second-step exam3-thirdStep">
    <div class="container">
        <!-- Title  & Indicator -->
        <div class="row mb-4 pt-5 justify-content-center">
            <!-- Title -->
            <div class="col-md-12 d-flex align-items-center">
                <div>
                    <img style="max-width: 100px;" src="{{asset('assets/user/assets/images/exam31.png')}}" alt="...">
                </div>
                <h4 class="fw-bold mb-0 ps-2">
                    مستكشف تحديات المستقبل
                    <span class="fw-normal">
                        (WCE)
                    </span>
                </h4>
            </div>
            <!-- Indicator -->
            <div class="col-lg-12 my-2 text-center">
                <div class="circle-progress">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                        js-progress-bar" />
                    </svg>
                    <div class="text">
                        100
                    </div>
                </div>
            </div>
        </div>
        <!-- Questation -->
        <div class="row" data-aos="fade-left" data-aos-delay="1000">
            <div class="col-12">
                <div class="questation">
                    <h3 class="mb-0">
                        لقد انتهيت من المقياس كاملاً والآن اختر نوع التقرير الذي تحتاجه
                    </h3>
                </div>
            </div>
        </div>
        <!-- Answer Box -->
        <div class="row" data-aos="fade-up" data-aos-delay="1000">
            <div class="col-12">
                <div class="answers-wrapper">
                    <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio1">
                            <div>
                                <div class="text-in-btn">
                                    تقرير شامل
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio2">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار العلمي
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio3">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار الأدبي
                                </div>
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5"></div>

@elseif($startSkillsreport)
<div class="exam-second-step exam2-thirdStep">

    <div class="container">
        <!-- Title  & Indicator -->
        <div class="row mb-4 pt-5 justify-content-center">
            <!-- Title -->
            <div class="col-md-12 d-flex align-items-center">
                <div>
                    <img style="max-width: 100px;"  src="{{asset('assets/user/assets/images/exam21.png')}}" alt="...">
                </div>
                <h4 class="fw-bold mb-0 ps-2">
                    المقياس العربي للقدرات
                    <span class="fw-normal">
                        (AMIAS)
                    </span>
                </h4>
            </div>
            <!-- Indicator -->
            <div class="col-lg-12 my-2 text-center">
                <div class="circle-progress">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                        <circle cx="16" cy="16" r="15.9155" class="progress-bar__progress
                        js-progress-bar" />
                    </svg>
                    <div class="text">
                        100
                    </div>
                </div>
            </div>
        </div>
        <!-- Questation -->
        <div class="row"  data-aos="fade-left" data-aos-delay="1000">
            <div class="col-12">
                <div class="questation">
                    <h3 class="mb-0">
                        لقد انتهيت من المقياس كاملاً والآن اختر نوع التقرير الذي تحتاجه
                    </h3>
                </div>
            </div>
        </div>
        <!-- Answer Box -->
        <div class="row"  data-aos="fade-up"  data-aos-delay="1000">
            <div class="col-12">
                <div class="answers-wrapper">
                    <div class="btn-group-vertical w-100" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio1">
                            <div>
                                <div class="text-in-btn">
                                    تقرير شامل
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio2">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار العلمي
                                </div>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary single-answer" for="btnradio3">
                            <div>
                                <div class="text-in-btn">
                                    تقرير لطلاب المسار الأدبي
                                </div>
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5"></div>


@endif
