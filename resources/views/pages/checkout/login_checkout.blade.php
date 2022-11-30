@extends('layout')
@section('content')
    <link rel="stylesheet" href="Caycanh/css/login.css">

    <div class="login-page">
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
        <div class="form">
            <h2>Login</h2>
            <form action="{{URL::to('/login-customer')}}" method="POST" class="login-form" enctype="multipart/form-data">
                @csrf
                <input type="text" name="email_account" placeholder="Tài khoản" />
                @if($errors->has('email_account'))
                    <label class="Text-red"
                           style=" font-size:15px;font-weight:600;margin-top:5px;color:red">
                        <i class="fa fa-info"></i>{{$errors->first('email_account')}}
                    </label>
                @endif
                <input type="password" name="password_account" placeholder="Password" />
                @if($errors->has('password_account'))
                    <label class="Text-red"
                           style=" font-size:15px;font-weight:600;margin-top:5px;color:red">
                        <i class="fa fa-info"></i>{{$errors->first('password_account')}}
                    </label>
                @endif
                <input type="checkbox" class="checkbox" >
								Ghi nhớ đăng nhập

                <button type="submit">login</button>
                <p class="message">Tạo tài khoản <a href="{{URL::to('dang-ky')}}">Đăng ký</a></p>
            </form>
        </div>
    </div>




@endsection
@section('myjs')
    <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });

    </script>
@endsection
