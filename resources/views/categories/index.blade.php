@extends('layouts.app')

@section('content')


    <div class="row ">
        <div class="w3-animate-right">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-tag fa-fw"></i> 创建新的哔哔分类
                </div>
                <div class="panel-body">

                    {!! Form::open(['method'=>'POST','action'=>'CategoryController@store']) !!}

                    <div class="input-group">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'请输入新的分类名....']) !!}
                        <span class="input-group-btn">
                        {!! Form::submit('创建分类',['class'=>'btn btn-info ']) !!}
                        </span>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="">
            {{--载入显示错误的界面--}}
            @include('includes.form_error')
        </div>

    </div>


    <div class="row ">
        <div class="w3-animate-left">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-tags fa-fw"></i> 你的所有哔哔分类
                </div>
                <div class="panel-body">
                    @if($categories)
                        @foreach($categories as $category)
                            <div class="well well-sm"><i class="fa fa-tag "></i> <i
                                        class=" w3-large">{{$category->name}}</i><a
                                        href="{{route('category.destroy',$category->id)}}"
                                        class="pull-right w3-hover-text-red">删除</a></div>
                        @endforeach
                    @else
                        你暂时还没有创建任何哔哔分类,请在上面创建新的分类吧~
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
