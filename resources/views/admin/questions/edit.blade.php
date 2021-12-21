@extends('admin.layouts.common.master')

@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
             data-bs-target="#kt_account_profile_details" aria-expanded="true"
             aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0"> تعديل سؤال >> {{$question->question}} </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('questions.update', 'test')}}" method="POST" id="create">
                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{$question->id}}" required/>

                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">السؤال</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="question" class="form-control form-control-lg form-control-solid"
                                   placeholder="ادخل السؤال" value="{{$question->question}}" required/>
                            @error('question')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الإختبار</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Team Member" name="test" required>
                                @foreach($tests as $test)
                                    <option
                                        value="{{$test->id}}" {{$test->id == $question->test_id ? 'selected' : ''}}>{{$test->test}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">المجموعة</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Team Member" name="collection[]" multiple required>
                                @php
                                    $collection_id = preg_split("/[,]/", $question->collection_id);
                                @endphp
                                @foreach($collections as $collection)
                                    <option {{in_array($collection->id, $collection_id) ? 'selected' : ''}}
                                            value="{{$collection->id}}">{{$collection->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الإجابات</label>
                        <div class="col-lg-10 fv-row">

                            <div class="answers row">
                                @foreach($question->answers as $answer)
                                    <div class="col-lg-9">
                                        <input name="answers[]" type="text" value="{{$answer->answer}}"
                                               placeholder="ادخل الإجابة" class="form-control col-sm-12 m-2" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <input name="degrees[]" type="text" value="{{$answer->degree}}"
                                               placeholder="الدرجة" class="form-control col-sm-12 m-2" required>
                                    </div>
                                @endforeach
                            </div>

                            <a class="form-control btn btn-success m-2  add"><i class="fa fa-plus "></i> إضافة
                                إجابة
                                أخرى </a>
                        </div>
                    </div>

                </div>
                <!--End::Card body-->
                <!-- Start Action -->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-warning me-2">تراجع</button>
                    <button type="submit" form="create" value="Submit" class="btn btn-primary">حفظ</button>
                </div>
                <!-- End Action -->
            </form>
            <!-- End Form -->
        </div>
        <!--End::Content-->
    </div>
    <!--End::Basic info-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('select[name="test"]').on('change', function () {
                var test_id = $(this).val();
                if (test_id) {
                    $.ajax({
                        url: "{{'getCollections'}}/" + test_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="collection[]"]').empty();
                            $('select[name="collection[]"]').append('<option selected disabled >اختر من القائمة</option>');
                            $.each(data, function (key, value) {
                                $('select[name="collection[]"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.add').click(function () {
                $('.answers').append(
                    '<div class="col-lg-9"> <input name="answers[]" type="text" placeholder="ادخل الإجابة" class="form-control col-sm-12 m-2" required> </div>' +
                    '<div class="col-lg-3"> <input name="degrees[]" type="text" placeholder="الدرجة" class="form-control col-sm-12 m-2" required> </div>')
            })
        })
    </script>
@stop
