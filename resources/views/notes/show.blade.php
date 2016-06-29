@extends('layouts.app')

@section('content')

    @if($note)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-clock-o fa-fw"></i> {{$note->title}}
                    </div>
                    <div class="panel-body">
                        {{$note->content}}
                        <hr>
                        <div id="uyan_frame"></div>
                        <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
