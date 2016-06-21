@extends('layouts.test')

@section('content')

    {{--所有note--}}
    <!-- 列出所有记录 -->
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> 你的初心记录
                </div>
                <div class="panel-body">
                    <ul class="timeline">

                        @if($notes)
                            <?php $invert = false; ?>
                            @foreach($notes as $note)
                                <li class="{{$invert?'timeline-inverted':''}}" >
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
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <i class="fa fa-gear"></i> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="">编辑</a>
                                                </li>
                                                <li><a href="#">删除</a>
                                                </li>
                                                <li><a href="#">增加标记</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php $invert = !$invert; ?>

                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
