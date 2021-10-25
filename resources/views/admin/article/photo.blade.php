    <!--begin:: Avatar -->
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="#">
            @if (!empty($photo))
            <div class="symbol-label">
                <img src="{{Storage::url($photo)}}" alt="{{$title}}" class="w-100">               
            </div>
            @else  
            <div class="symbol-label fs-3 bg-light-danger text-danger">{{$title}}</div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->
   