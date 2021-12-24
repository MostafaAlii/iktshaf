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
                <h3 class="fw-bolder m-0">اضافة سؤال جديد</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_profile_details" class="collapse show">
            <!-- Start Form -->
            <form action="{{ route('questions.store') }}" method="POST" id="create">
            @csrf
            <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">السؤال</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="question" class="form-control form-control-lg form-control-solid"
                                   placeholder="ادخل السؤال" value="{{old('question')}}" required/>
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
                                <option disabled selected>اختر من القائمة</option>
                                @foreach($tests as $test)
                                    <option value="{{$test->id}}">{{$test->test}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">المجموعة</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select a Team Member" name="collection[]" multiple required>

                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label required fw-bold fs-6">الإجابات</label>
                        <div class="col-lg-10 fv-row">
                            <div class="answers row">
                                <div class="col-lg-9">
                                    <input name="answers[]" type="text" placeholder="ادخل الإجابة" class="form-control col-sm-12 m-2" required>
                                </div>
                                <div class="col-lg-2">
                                    <input name="degrees[]" type="text" placeholder="الدرجة" class="form-control col-sm-12 m-2" required>
                                </div>
                                <div class="col-lg-1">
                                    <select name="emoji[]" style="font-size: 25px;">
                                        <option value="128512">&#128512</option>
                                        <option value="128516">&#128516</option>
                                        <option value="128525">&#128525</option>
                                        <option value="128151">&#128151</option>
                                        <option value="128513">&#128513</option>
                                        <option value="128514">&#128514</option>
                                        <option value="128515">&#128515</option>
                                        <option value="128517">&#128517</option>
                                        <option value="128518">&#128518</option>
                                        <option value="128519">&#128519</option>
                                        <option value="128520">&#128520</option>
                                        <option value="128521">&#128521</option>
                                        <option value="128522">&#128522</option>
                                        <option value="128523">&#128523</option>
                                        <option value="128524">&#128524</option>
                                        <option value="128526">&#128526</option>
                                        <option value="128527">&#128527</option>
                                        <option value="128528">&#128528</option>
                                        <option value="128529">&#128529</option>
                                        <option value="128530">&#128530</option>
                                        <option value="128531">&#128531</option>
                                        <option value="128532">&#128532</option>
                                        <option value="128533">&#128533</option>
                                        <option value="128536">&#128536</option>
                                        <option value="128544">&#128544</option>
                                        <option value="128545">&#128545</option>
                                        <option value="128550">&#128550</option>
                                        <option value="128578">&#128578</option>
                                        <option value="129300">&#129300</option>
                                        <option value="129321">&#129321</option>
                                        <option value="129488">&#129488</option>
                                        <option value="129317">&#129317</option>
                                        <option value="129320">&#129320</option>
                                        <option value="129301">&#129301</option>
                                    <select>
                                </div>
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
                    '<div class="col-lg-2"> <input name="degrees[]" type="text" placeholder="الدرجة" class="form-control col-sm-12 m-2" required> </div>' +
                    '<div class="col-lg-1"><select name="emoji[]" style="font-size: 25px;">' +
                    '<option value="128512">&#128512</option><option value="128516">&#128516</option><option value="128525">&#128525</option>' +
                    '<option value="128151">&#128151</option><option value="128513">&#128513</option><option value="128514">&#128514</option>' +
                    '<option value="128515">&#128515</option><option value="128517">&#128517</option><option value="128518">&#128518</option>' +
                    '<option value="128519">&#128519</option><option value="128520">&#128520</option><option value="128521">&#128521</option>' +
                    '<option value="128522">&#128522</option><option value="128523">&#128523</option><option value="128524">&#128524</option>' +
                    '<option value="128526">&#128526</option><option value="128527">&#128527</option><option value="128528">&#128528</option>' +
                    '<option value="128529">&#128529</option><option value="128530">&#128530</option><option value="128531">&#128531</option>' +
                    '<option value="128532">&#128532</option><option value="128533">&#128533</option><option value="128536">&#128536</option><option value="128544">&#128544</option>' +
                    '<option value="128545">&#128545</option><option value="128550">&#128550</option><option value="128578">&#128578</option>' +
                    '<option value="129300">&#129300</option><option value="129321">&#129321</option><option value="129488">&#129488</option>' +
                    '<option value="129317">&#129317</option><option value="129320">&#129320</option><option value="129301">&#129301</option><select></div>')

                })
        })
    </script>
@stop
