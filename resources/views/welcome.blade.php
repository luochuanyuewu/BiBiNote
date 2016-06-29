@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="w3-animate-top">
            <div class="panel panel-info">
                <div class="panel-heading">欢迎来到《爱哔哔,爱生活》——您生活中的吐槽小助手</div>

                <div class="panel-body">
                    <p class="small">首先爱哔哔绝对<span class="w3-text-red">不是一个留言板那么简单</span>
                        你可以点击右上角菜单注册登录，然后可以记录自己的心情，笔记等各种各样的内容并选择是否公开到主页，
                        你还可以对自己的内容进行分类管理，还有许多许多其他功能，赶紧登陆探索吧~ <span class="w3-text-red">游客是只能评论和查看</span>公开分享以及<span class="w3-text-red">其他用户信息</span>的哦~
                    </p>

                </div>
            </div>
        </div>

    </div>

    {{--所有note--}}
    <div class="row ">
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <i class="fa fa-clock-o fa-fw"></i> 这些人在哔哔
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
                        暂时还没有人把他的哔哔公开出来。
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
