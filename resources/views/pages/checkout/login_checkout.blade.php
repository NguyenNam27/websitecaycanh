@extends('layout')
@section('content')
    <link rel="stylesheet" href="Caycanh/css/login.css">

    <div class="login-page">


        <div class="form">
            <h2>Login</h2>
            <form action="{{URL::to('/login-customer')}}" method="POST" class="login-form" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="email_account" placeholder="Tài khoản" />
                <input type="password" name="password_account" placeholder="Password" />

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
