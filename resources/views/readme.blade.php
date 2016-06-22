@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">说明</div>

                    <div class="panel-body">
                        <h4>前言:</h4>
                        <p>
                            你居然点进来了,不好意思又到了装逼时刻,我先忍住不笑。。。。。。<img src="{{url('/images/笑.jpg')}}" alt="">
                        </p>
                        <h4>应用说明:</h4>
                        <p>
                            爱哔哔,爱生活——您生活中的吐槽小助手。<br>
                            您可以无限制无节操无拘束地发表各种吐槽,言论,适合那种喜欢哔哔的人使用(前提是你先点右上角注册一下谢谢~)。你的言论可以设置成公开或者私有(点击哔哔下面的小眼睛按钮来切换),无论用户是否登录,都可以在本应用的主页查看其他人都哔哔了什么,然后还有一件很重要的事情就是..
                            嗯,我哔哔完了。。。
                        </p>
                        <h4>技术实现:</h4>
                        <p>
                            前端:html bootstrap(大量使用) jquery(少量使用) font-awesome w3.css<br>
                            后端:Laravel 5.2 <br>
                            运行环境:Php(>=5.5) apache mysql <br>
                            项目源代码:待更新。。。
                        </p>
                        <h4>后记:</h4>
                        <p>我是罗传月武(刘金生)更多关于我请访问->
                            <a href="http://luochuanyuewu.com" ><i class="w3-text-red">luochuanyuewu.com</i></a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
