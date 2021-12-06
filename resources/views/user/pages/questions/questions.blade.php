@extends('user.layouts.master')

@section('css')
    @livewireStyles
@stop

@section('content')
    <!-- =============================================================== -->
    <!-- content Start -->
    <!-- =============================================================== -->
    <livewire:questions/>
    <!-- =============================================================== -->
    <!-- content End -->
    <!-- =============================================================== -->
@endsection

@section('js')
    @livewireScripts
@stop
