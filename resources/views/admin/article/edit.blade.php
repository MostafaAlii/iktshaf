@extends('admin.layouts.common.master')

@section('content')


<script src="{{ url ('/assets/admin/tinymce/tinymce.min.js')}}"></script>

 <script type="text/javascript">
     tinymce.init({

         selector: "textarea#elm1",

         theme: "modern",

         skin: "lightgray",

         language: "en",

         width: 812,
         height: 342,

         resize: false,

         menubar: false,
         subfolder: "",
         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
         // ===========================================
         // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
         // ===========================================
         relative_urls: false,
         image_advtab: true,

         toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | link image | fullscreen",

         ptoolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime | link unlink anchor | print preview fullpage | save | table | sizeselect | fontsizeselect | styleselect | forecolor backcolor emoticons | cut copy paste | code hr | fullscreen",

         plugins: [
             "advlist autolink lists link image charmap print preview anchor",
             "searchreplace visualblocks code fullscreen",
             "insertdatetime media table contextmenu paste filemanager"
         ],


         content_css: "css/content.css",


         style_formats: [{
                 title: 'Motken Unicode Hor',
                 inline: 'span',
                 styles: {
                     'font-family': 'Motken Unicode Hor'
                 }
             },
             {
                 title: 'Old Antic Bold',
                 inline: 'span',
                 styles: {
                     'font-family': 'Old Antic Bold'
                 }
             },
             {
                 title: 'SC_AMEEN',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_AMEEN'
                 }
             },
             {
                 title: 'SC_DUBAI',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_DUBAI'
                 }
             },
             {
                 title: 'SC_TARABLUS',
                 inline: 'span',
                 styles: {
                     'font-family': 'SC_TARABLUS'
                 }
             }
         ]
     });
 </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$title}}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['url'=>aurl('article/'.$article->id),'method'=>'put','files'=>true])!!}
                <div class="form-group">
                        {!! Form::label('title',trans('admin.title'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::text('title',$article->title,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('description',trans('admin.description'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::text('description',$article->description,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('video',trans('admin.video'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::text('video',$article->video,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                        @if (!empty($article->photo))
                        <img src="{{Storage::url($article->photo)}}" style="height: 100px;width: 150px;" >
                        @endif
                        {!! Form::label('photo',trans('admin.photo'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::file('photo',['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('content',trans('admin.content'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::textarea('content',$article->content,['class'=>'form-control','id'=>'elm1'])!!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('type',trans('admin.type'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::select('type',['article'=>trans('admin.article'),'video'=>trans('admin.video')],$article->type,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('tags',trans('admin.tags'),['class'=>'form-control-label col-sm-2'])!!}
                        {!! Form::text('tags',$article->tags,['class'=>'form-control','data-role'=>'tagsinput'])!!}
                        </div>
                        <hr>
                        <input type="hidden" name="user_id"  value="{{$article->user_id}}">
                        <input type="hidden" name="department_id" class="departeanet_id" value="{{$article->department_id}}">
                        <div id="jstree"></div>
                        <div class="form-group">
                        <div class="col-sm-offset-6">
                        <br>
                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])!!}
                {!! Form::close()!!}

            </div>
        </div>
    </div>
</div>

@endsection
