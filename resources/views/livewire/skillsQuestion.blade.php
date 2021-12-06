<!-- =============================================================== -->
<!-- Welcome Sign page Start -->
<!-- =============================================================== -->
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
                                <div wire:click="nextQuestion">
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

<!-- =============================================================== -->
<!-- Welcome Sign page End -->
<!-- =============================================================== -->
