@extends('layouts.app')

@section('content')


    <div class="row w3-animate-right">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <i class="fa fa-tag fa-fw"></i> 创建新的哔哔分类
                </div>
                <div class="panel-body">

                    {!! Form::open(['method'=>'POST','action'=>'CategoryController@store']) !!}

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

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{--载入显示错误的界面--}}
            @include('includes.form_error')
        </div>

    </div>

    @if($categories)
        <div class="row w3-animate-left">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <i class="fa fa-tags fa-fw"></i> 你的所有哔哔分类
                    </div>
                    <div class="panel-body">
                        @foreach($categories as $category)
                            <div class="well well-sm"><i class="fa fa-tag "></i> <i
                                        class=" w3-large">{{$category->name}}</i><a
                                        href="{{route('category.destroy',$category->id)}}"
                                        class="pull-right w3-hover-text-red">删除</a></div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    @else
        <div class="row w3-animate-left">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-danger">
                    <div class="panel-body">
                        你暂时还没有创建任何哔哔分类,请在上面创建新的分类吧~
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection
