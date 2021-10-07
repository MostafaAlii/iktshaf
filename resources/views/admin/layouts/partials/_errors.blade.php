@if(Session::has('error'))
    <div class="row mr-2 ml-2" >
            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('error')}}
            </button>
    </div>
@endif

<!--begin::Alert-->
@if(Session::has('error'))
        <div class="alert alert-danger">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-3"></span>
                <!--end::Icon-->
        
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                <!--begin::Title-->
                <h4 class="mb-1 text-dark"></h4>
                <!--end::Title-->
                <!--begin::Content-->
                <span>{{Session::get('success')}}</span>
                <!--end::Content-->
                </div>
                <!--end::Wrapper-->
        </div>
        <!--end::Alert-->
@endif