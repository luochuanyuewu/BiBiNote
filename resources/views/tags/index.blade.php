@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> 创建新分类
                </div>
                <div class="panel-body">

                    {!! Form::open(['method'=>'POST','action'=>'TagController@store']) !!}

                    <div class="input-group">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'请输入新的分类名....']) !!}
                        <span class="input-group-btn">
                        {!! Form::submit('创建分类',['class'=>'btn btn-default ']) !!}
                        </span>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>


    @if($tags)
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> 您的标记
                    </div>
                    <div class="panel-body">
                        @foreach($tags as $tag)
                            <a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            你还没有任何标记,请在上面创建新的标记
        </div>
    @endif
@endsection
