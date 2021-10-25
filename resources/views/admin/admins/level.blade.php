@if ($level == 1)    
<a href="#" class="badge badge-light-primary fs-7 m-1">إدارة</a>
@elseif($level == 2)
<a href="#" class="badge badge-light-info fs-7 m-1">مشرف</a>
@else
<a href="#" class="badge badge-light-info fs-7 m-1">مسوق</a>
@endif

