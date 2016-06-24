@extends('layouts.app')

@section('content')

    @if(Session::has('updated_user'))
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <p class="bg-danger" >{{session('updated_user')}}</p>
            </div>
        </div>
    @endif


@endsection