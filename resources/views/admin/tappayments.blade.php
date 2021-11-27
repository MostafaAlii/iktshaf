@extends('admin.layouts.common.master')

@section('content')
   


<div class="box">

  <div class="box-header">

    <h3 class="box-title">بوابة دفع تاب</h3>

  </div>

  <!-- /.box-header -->

  <div class="box-body">

    {!! Form::open(['url'=>aurl('tappayments'),'files'=>true]) !!}

    <div class="form-group">

      {!! Form::label('UserName','أسم المستخدم') !!}

      {!! Form::text('UserName',tappayments()->UserName,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

      {!! Form::label('Password','كلمة المرور') !!}

      {!! Form::text('Password',tappayments()->Password,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

      {!! Form::label('api_key','اى بي اى') !!}

      {!! Form::text('api_key',tappayments()->api_key,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

      {!! Form::label('Authorization','Authorization') !!}

      {!! Form::text('Authorization',tappayments()->Authorization,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

      {!! Form::label('currency','العملة') !!}

      {!! Form::text('currency',tappayments()->currency,['class'=>'form-control']) !!}

    </div>

    <div class="form-group">

      {!! Form::label('live','النوع') !!}

      {!! Form::select('live',['live'=>'مباشر','test'=>'أختبار'],tappayments()->live,['class'=>'form-control']) !!}

    </div>

     <div class="form-group">

      {!! Form::label('status','الحالة') !!}

      {!! Form::select('statue',['open'=>'مفتوح','closed'=>'مغلق'],tappayments()->status,['class'=>'form-control']) !!}

    </div>


    {!! Form::submit('حفظ',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

  </div>

  <!-- /.box-body -->

</div>

<!-- /.box -->

@endsection