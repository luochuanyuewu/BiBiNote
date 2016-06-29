@extends('layouts.app')

@section('content')
    @if($user)
        <div class="row">
            <div class="w3-animate-top">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-info-circle fa-fw"></i> {{$user->name}}的资料
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><label>头像:</label><img width="100" height="100" id="name"
                                                                               src="{{$user->avatar?$user->avatar->path:'/images/defaultavatar.jpg'}}"
                                                                               class="img-thumbnail img-responsive img-rounded"
                                                                               style="margin: 3px"></li>
                            <li class="list-group-item"><label>姓名:</label>{{$user->name}}</li>
                            <li class="list-group-item"><label>性别:</label>{{$user->sex}}</li>
                            <li class="list-group-item"><label>扣扣号:</label>{{$user->qq}}</li>
                            <li class="list-group-item"><label>邮箱:</label>{{$user->email}}</li>
                            <li class="list-group-item"><label>生日:</label>{{$user->birthday}}</li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

        {{--所有note--}}
        <div class="row ">
            <div class="">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> {{$user->name}}的所有公开哔哔
                    </div>
                    <div class="panel-body">
                        @if(count($notes))
                            <ul class="timeline">
                                <?php $invert = false; ?>
                                @foreach($notes as $note)
                                    <li class="{{$invert?'timeline-inverted w3-animate-left':'w3-animate-right'}}">

                                        <div class="timeline-badge w3-spin w3-hover-opacity">
                                            <a href="{{route('user.show',$note->user->id)}}">
                                                <img height="50" width="50"
                                                     class="img-responsive img-thumbnail img-rounded img-circle"
                                                     style="margin: 2px"
                                                     src="{{$note->user->avatar?$note->user->avatar->path:url('images/defaultavatar.jpg')}}">
                                            </a>
                                            {{--<i class="fa fa-check"></i>--}}
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title"><i
                                                            class="fa fa-sticky-note"></i> {{$note->title}}</h4>

                                            </div>
                                            <br>
                                            <div class="timeline-body">
                                                <p style="word-break: break-all">{{$note->content}}</p>

                                            </div>
                                            <br>
                                            <p>
                                                <small class="text-muted"><i
                                                            class="fa fa-clock-o"></i>{{$note->user->name}}
                                                    创建于 {{$note->created_at?$note->created_at->diffForHumans():'未知时间'}}
                                                    分类: {{$note->category?$note->category->name:'无'}}
                                                    <a class="pull-right" href="{{route('note.show',$note->id)}}">
                                                        <button type="button" class="btn btn-default btn-xs">
                                                            <i class="fa fa-commenting"></i>
                                                        </button>
                                                    </a>
                                                </small>
                                            </p>


                                        </div>
                                    </li>
                                    <?php $invert = !$invert; ?>
                                @endforeach
                            </ul>
                        @else
                            {{$user->name}}暂时没有公开任何哔哔
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
