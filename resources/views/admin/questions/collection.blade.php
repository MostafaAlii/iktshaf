@php
$collection= preg_split("/[,]/",$collection_id);
@endphp
@foreach ($collection as $collec )
@php
$coll=app\Models\Collection::find($collec);
@endphp
<a href="#" class="btn btn-primary">{{$coll->name}}</a>
@endforeach
