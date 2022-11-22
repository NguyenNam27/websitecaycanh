@extends('layout')
@section('content')
    <link rel="stylesheet" href="Caycanh/css/login.css">

    <div class="login-page">

        <div class="form">
            <h2>Register</h2>
            <form action="{{URL::to('/add-customer')}}" method="POST" class="register-form">
                @csrf
                <input type="text" name="customer_name" placeholder="Họ và tên"/>
                <input type="text" name="customer_email" placeholder="Địa chỉ email"/>
                <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                <input type="text" name="customer_phone" placeholder="Điện thoại"/>
                <button type="submit">Tạo tài khoản</button>
                <p class="message">Bạn đã có tài khoản? <a href="{{URL::to('/dang-nhap')}}">Đăng nhập</a></p>
            </form>
        </div>
    </div>




@endsection


