@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">开始记录一些东西吧~</div>

            <div class="panel-body">
                你已经登录!
            </div>
        </div>
    </div>
    @if($notes)
        @foreach($notes as $note)
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">{{$note->title}}</div>

                    <div class="panel-body">
                        {{$note->content}}
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
