@extends('layouts.app')

@section('content')
        <div class="row w3-animate-zoom">
                <div class="panel panel-info">
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
                            项目源代码:<a href="https://github.com/luochuanyuewu/BiBiNote" ><span class="w3-text-blue">BiBiNote</span></a>
                        </p>
                        <h4>功能特性:</h4>
                        <p>
                            1.游客对用户公开分享的内容的查看以及评论<br>
                            2.用户的登陆与注册以及对用户信息的修改（更新头像，密码，用户名等等）<br>
                            3.文章的增删改（包括指定文章的分类等等，仅限用户自己的文章）<br>
                            4.文章分类的创建和删除，以及按指定分类浏览文章（仅限用户自己的文章）<br>
                            5.用户列表以及单用户的资料和文章查询<br>
                        </p>
                        <h4>后记:</h4>
                        <p>我是罗传月武(刘金生)更多关于我请访问->
                            <a href="http://luochuanyuewu.com" ><span class="w3-text-blue">luochuanyuewu.com</span></a>
                        </p>
                    </div>
                </div>
        </div>
@endsection
