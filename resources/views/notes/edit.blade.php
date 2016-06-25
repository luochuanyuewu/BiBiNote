@extends('layouts.app')

@section('content')

    @if($note)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> 编辑你的哔哔内容
                    </div>
                    <div class="panel-body">

                        {!! Form::model($note,['method'=>'PATCH','action'=>['NoteController@update',$note->id],'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('title','哔哔标题:') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id','哔哔分类:') !!}
                            {!! Form::select('category_id',[''=>'选择一个分类'] + $categories,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('content','哔哔内容:') !!}
                            {{--第二个参数是默认内容--}}
                            {!! Form::textarea('content',null,['class'=>'form-control','rows'=>15]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('更新笔记',['class'=>'btn btn-info btn-block col-sm-6']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{--载入显示错误的界面--}}
            @include('includes.form_error')
        </div>

    </div>
@endsection
