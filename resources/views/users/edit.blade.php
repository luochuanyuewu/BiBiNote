@extends('layouts.app')

@section('content')


    @if($user)
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-info-circle fa-fw"></i> 编辑你的帐户资料
                    </div>
                    <div class="panel-body">
                        <img id="name" src="{{$user->avatar?$user->avatar->path:'/images/defaultavatar.jpg'}}"
                             class="img-thumbnail img-responsive img-rounded" style="margin: 3px">

                        {!! Form::model($user,['method'=>'PATCH','action'=>'UserController@update','files'=>true]) !!}

                        {{csrf_field()}}

                        <div class="form-group">
                            {!! Form::label('name','姓名:') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('email','邮箱:') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('avatar_id','选择新头像:') !!}
                            {!! Form::file('avatar_id',['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                        {!! Form::label('password','密码:') !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('更新帐户',['class'=>'btn btn-default btn-block']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

        </div>
    @endif

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{--载入显示错误的界面--}}
            @include('includes.form_error')
        </div>

    </div>
@endsection
