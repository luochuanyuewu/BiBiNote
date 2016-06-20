@extends('layouts.app')

@section('content')

    <div class="container">
        {{--<div class="row">--}}
        {{--<div class="col-md-5 col-md-offset-3">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
        {{--开始记录一些东西吧~ <span class="btn-default right" style="font-size: 18px">X</span>--}}
        {{--</div>--}}
        {{--<form action="#" method="post">--}}
        {{--<div class="panel-body">--}}
        {{--<input type="text" class="form-control">--}}
        {{--<input type="button" class="form-control">--}}

        {{--</div>--}}
        {{--</form>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">开始记录一些东西吧~</div>

                    <div class="panel-body">
                        你已经登录!
                    </div>
                </div>
            </div>
        </div>
        @if($notes)
            @foreach($notes as $note)
                <div class="row">
                    <div class="col-lg-3 col-sm-12 col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$note->title}}</div>

                            <div class="panel-body">
                                {{$note->content}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection
