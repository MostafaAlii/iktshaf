@if ($status == 1)   
 <a href="#" class="badge badge-light-info fs-7 m-1">فعال</a>
@elseif($status == 2)
<a href="#" class="badge badge-light-info fs-7 m-1">قيد اﻻنتظار</a>
@else
<a href="#" class="badge badge-light-primary fs-7 m-1">مغلق</a>
@endif