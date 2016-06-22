@extends('layouts.app')

@section('content')


    @if($note)
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> 编辑您的Note
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method'=>'POST','action'=>'NoteController@store','files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::label('title','标题:') !!}
                            {!! Form::text('title',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('content','内容:') !!}
                            {{--第二个参数是默认内容--}}
                            {!! Form::textarea('content',null,['class'=>'form-control','rows'=>10]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('创建笔记',['class'=>'btn btn-primary col-sm-6']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
