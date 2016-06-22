@extends('layouts.app')

@section('content')

    {{--所有note--}}
    <!-- 列出所有记录 -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> 你的初心记录
                    <button type="button" class="btn btn-default btn-xs pull-right" data-toggle="modal"
                            data-target="#myModal">写笔记
                    </button>

                </div>
                <div class="panel-body">
                    @if($notes)

                        <ul class="timeline">


                            <?php $invert = false; ?>
                            @foreach($notes as $note)
                                <li class="{{$invert?'timeline-inverted':''}}">
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{$note->title}}</h4>
                                            <p>
                                                <small class="text-muted"><i
                                                            class="fa fa-clock-o"></i>{{$note->user->name}}
                                                    创建于 {{$note->created_at?$note->created_at->diffForHumans():'未知时间'}}
                                                </small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{$note->content}}</p>
                                        </div>
                                        <hr>
                                        <div class="btn-group pull-right ">
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
                        你暂时还没有任何笔记,请点击上方按钮创建笔记哟
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
                    <h4 class="modal-title">今天您有什么事情想要记录的呢?</h4>
                </div>
                <div class="modal-body">
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
