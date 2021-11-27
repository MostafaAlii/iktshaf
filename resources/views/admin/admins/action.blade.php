@if ($status == 0 &&  $level >1)    
<a href="{{ aurl('admins/activ/'.$id) }}" class="btn btn-primary">تفعيل</a>
@elseif($status == 1 &&  $level >1)
<a href="{{ aurl('admins/desactiv/'.$id) }}" class="btn btn-info">تعطيل</a>
@endif
<a href="{{ aurl('admins/edit/'.$id) }}" class="btn btn-success">تعديل</a>
@if ($id  >1)    
<a href="{{ aurl('admins/delete/'.$id) }}" class="btn btn-danger">حذف</a>
@endif

