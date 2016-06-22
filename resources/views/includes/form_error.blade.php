{{--如果有错误,就输出所有错误--}}
@if(count($errors) >0)

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>

            @endforeach
        </ul>
    </div>
@endif