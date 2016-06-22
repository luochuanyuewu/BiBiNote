@extends('layouts.app')

@section('content')

    @if(Session::has('deleted_note'))
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <p class="bg-danger" >{{session('deleted_note')}}</p>
            </div>
        </div>
    @elseif(Session::has('updated_note'))
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <p class="bg-danger" >{{session('updated_note')}}</p>
            </div>
        </div>
    @elseif(Session::has('created_note'))
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <p class="bg-danger" >{{session('created_note')}}</p>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            {{--载入显示错误的界面--}}
            @include('includes.form_error')
        </div>

    </div>


    {{--所有note--}}
    <!-- 列出所有记录 -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> 你的哔哔记录
                    <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal"
                            data-target="#myModal">我要哔哔
                    </button>

                </div>
                <div class="panel-body">
                    @if(count($notes))
                        <ul class="timeline">

                            <?php $invert = false; ?>
                            @foreach($notes as $note)
                                <li class="{{$invert?'timeline-inverted':''}}">
                                    <div class="timeline-badge"><img height="50" width="50" class="img-responsive img-thumbnail img-rounded img-circle"
                                                                     style="margin: 2px" src= "{{url('images/defaultavatar.jpg')}}" >
                                        {{--<i class="fa fa-check"></i>--}}
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><i class="fa fa-sticky-note"></i> {{$note->title}}</h4>

                                        </div>
                                        <br>
                                        <div class="timeline-body">
                                            <p style="word-break: break-all">{{$note->content}}</p>

                                        </div>
                                        <br>
                                        <p>
                                            <small class="text-muted"><i class="fa fa-clock-o"></i>{{$note->user->name}}
                                                创建于 {{$note->created_at?$note->created_at->diffForHumans():'未知时间'}}
                                                分类: {{$note->category?$note->category->name:'无'}}
                                            </small>
                                        </p>
                                        <div class="btn-group pull-right ">
                                            <a href="{{route('note.edit',$note->id)}}">
                                                <button type="button" class="btn btn-default btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                    {{--<i class="fa fa-eye-slash"></i>--}}
                                                </button>
                                            </a>
                                            <a href="{{route('note.edit',$note->id)}}">
                                                <button type="button" class="btn btn-default btn-xs">
                                                    <i class="fa fa-tag"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('note.edit',$note->id)}}">
                                                <button type="button" class="btn btn-default btn-xs">
                                                    <i class="fa fa-gear"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('note.destroy',$note->id)}}">
                                                <button type="button" class="btn btn-default btn-xs">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <?php $invert = !$invert; ?>
                            @endforeach
                        </ul>
                    @else
                        你暂时还没有任何吐槽记录,请点击上按钮来哔哔几句吧~
                    @endif

                </div>
            </div>
        </div>
    </div>


    <!-- 创建Note的modal表单 -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">今天你有什么事情想要哔哔的呢?</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method'=>'POST','action'=>'NoteController@store','files'=>true]) !!}

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
                        {!! Form::textarea('content',null,['class'=>'form-control','rows'=>10]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('创建笔记',['class'=>'btn btn-default btn-block col-sm-6']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>

        </div>

    </div>
@endsection
