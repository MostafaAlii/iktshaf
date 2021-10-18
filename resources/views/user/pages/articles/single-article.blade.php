@extends('user.layouts.master')

@section('content')
<div class="container blogs-specialties-container">
<h3>{{$article->title}}</h3>
<p>{{$article->description}}</p>
<hr>
<p>{{$article->content}}</p>
</div>
@endsection()