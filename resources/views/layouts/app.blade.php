<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>爱哔哔,爱生活——您生活中的吐槽小助手</title>
    {{--载入所需要的所有css样式--}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <style>
        body {
            font-family: serif;
        }

        .fa-btn {
            margin-right: 6px;
        }

        a{
            text-decoration:none;
            color: black;
        }
        a:link{
            text-decoration:none;
            color: black;
        }
        a:visited{
            text-decoration:none;
            color: black;

        }
        a:hover{
            text-decoration:none;
            color: black;

        }
        a:active{
            text-decoration:none;
            color: black;

        }
    </style>
</head>

<body id="app-layout" class="w3-light-blue">

<nav class="navbar navbar-default navbar-static-top" >
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                爱哔哔——》
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('note.index')}}"><i class="fa fa-sticky-note "></i>我的哔哔</a></li>
                <li><a href="{{route('category.index')}}"><i class="fa fa-tag"></i>我的分类</a></li>
                <li><a href="{{route('user.showall')}}"><i class="fa fa-lightbulb-o"></i>所有用户</a></li>
                <li><a href="{{url('/readme')}}"><i class="fa fa-lightbulb-o"></i>访客必读</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('user.show',Auth::user()->id)}}"><i class="fa fa-btn fa-user"></i>个人资料</a></li>
                            <li><a href="{{ route('user.edit')}}"><i class="fa fa-btn fa-gear"></i>账号设置</a></li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出登录</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="container ">
            @yield('content')
</div>



{{--载入要需要的的所有js脚本--}}
<script src="{{asset('js/libs.js')}}"></script>


</body>
</html>
