@extends('layout')
@section('content')
    <link rel="stylesheet" href="Caycanh/css/login.css">

    <div class="login-page">
        <div class="form">
            <h2>Sign In</h2>
            <form action="{{URL::to('/add-customer')}}" method="POST" class="register-form">
                @csrf
                <input type="text" name="customer_name" placeholder="Họ và tên"/>
                <input type="text" name="customer_email" placeholder="Địa chỉ email"/>
                <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                <input type="text" name="customer_phone" placeholder="Phone"/>
                <button type="submit">create</button>
            </form>
        </div>
        <div class="form">
            <h2>Login</h2>
            <form action="{{URL::to('/login-customer')}}" method="POST" class="login-form">
                @csrf
                <input type="text" e="email_account" placeholder="Tài khoản" />
                <input type="password" name="password_account" placeholder="Password" />
                <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
                <button type="submit">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>


@endsection
