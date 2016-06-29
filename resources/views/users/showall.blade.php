@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-info-circle fa-fw"></i> 爱哔哔的所有用户，点击头像可以查看详细资料哦~
                </div>
                <div class="panel-body">
                    @if(count($users))
                        <ul class="list-group">
                            <?php $invert = false; ?>
                            @foreach($users as $user)
                                <li class="list-group-item {{$invert?'w3-animate-left':'w3-animate-right'}}"><a
                                            href="{{route('user.show',$user->id)}}"> <img width="50"
                                                                                          height="50"
                                                                                          id="name"
                                                                                          src="{{$user->avatar?$user->avatar->path:'/images/defaultavatar.jpg'}}"
                                                                                          class="img-thumbnail img-responsive img-rounded"></a>
                                    用户名:{{$user->name}} 性别:{{$user->sex}}
                                </li>
                                <?php $invert = !$invert; ?>
                            @endforeach
                        </ul>
                    @else
                        这个可怜的网站目前还没有任何一个人注册，囧。赶紧地点右上角菜单注册一个呗~
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
