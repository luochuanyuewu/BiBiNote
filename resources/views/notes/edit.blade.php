@extends('layouts.app')

@section('content')


    @if($note)
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> 编辑您的Note
                    </div>
                    <div class="panel-body">

                        {!! Form::model($note,['method'=>'PATCH','action'=>['NoteController@update',$note->id],'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('title','标题:') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('content','内容:') !!}
                            {{--第二个参数是默认内容--}}
                            {!! Form::textarea('content',null,['class'=>'form-control','rows'=>15]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('更新笔记',['class'=>'btn btn-default btn-block col-sm-6']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
