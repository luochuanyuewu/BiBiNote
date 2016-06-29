@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading">欢迎</div>

                <div class="panel-body">
                    欢迎来到《爱哔哔,爱生活》。这是您生活中的吐槽小助手,在下面看看别人都哔哔了什么吧~
                </div>
            </div>
        </div>

    </div>

    {{--所有note--}}
    <div class="row ">
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> 这些人在哔哔
                </div>
                <div class="panel-body">
                    @if(count($notes))
                        <ul class="timeline">
                            <?php $invert = false; ?>
                            @foreach($notes as $note)
                                <li class="{{$invert?'timeline-inverted w3-animate-left':'w3-animate-right'}}">

                                    <div class="timeline-badge w3-spin w3-hover-opacity"><img height="50" width="50"
                                                                                              class="img-responsive img-thumbnail img-rounded img-circle"
                                                                                              style="margin: 2px"
                                                                                              src="{{$note->user->avatar?$note->user->avatar->path:url('images/defaultavatar.jpg')}}">
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
