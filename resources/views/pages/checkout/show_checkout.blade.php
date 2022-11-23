@extends('layout')
@section('content')
    <section class="clear"></section>
    @if(Session::get('cart')==true)
        <section class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="tintuc_left">
                        <p class="tieude">TIN NỔI BẬT</p>
                        @foreach($hot_news as $new2)
                            <img class="tieude_img" src="{{asset('public/uploads/post/'.$new2->image)}}" alt="">
                            <a href=""><p class="text_tintuc_left">{{$new2->title}}</p></a>
                            <p class="sanp1"><img class="icon_tintuc" src="" alt="">{{$new2->created_at}}</p>
                        @endforeach

                    </div>
                </div>


                <div class="col-md-9 mg-gthieu">
                    <div class="row title-product ">

                        <div class="col-md-3 col-8 title-product1">
                            Giỏ hàng
                            <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
                        </div>

                    </div>
                    <div class="row tab_cart">
                        <div class="col-md-12 col-12">
                            <h3 style="margin-bottom: 30px">Giỏ hàng của bạn</h3>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                            <form action="{{url('/update-cart')}}" method="POST">
                                @csrf
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                        <th>Thành tiền</th>
                                        <th>Quản lý</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach(Session::get('cart') as $key =>$cart)
                                        @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp

                                        <tr class="tr_text">
                                            <td>{{$cart['product_name']}}</td>
                                            <td><img src="{{asset($cart['product_image'])}}" alt=""
                                                     style="width: 100px"></td>
                                            <td>

                                                <input class="cart_quantity_input"
                                                       name="cart_qty[{{$cart['session_id']}}]" type="text"
                                                       value="{{$cart['product_qty']}}"
                                                       style="width: 50px; border: none;">

                                                <input type="submit" value="Cập nhật " name="update_qty"
                                                       class="check_out btn btn-default btn-sm">

                                            </td>
                                            <td>{{number_format($cart['product_price'],0,',','.')}}đ</td>
                                            <td>{{number_format( $cart['product_price']*$cart['product_qty']) }}đ</td>
                                            <td><a href="{{url('/del-product/'.$cart['session_id'])}}"
                                                   class="btn btn-danger">Xóa</a></td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                @if(Session::get('cart'))
                                    <tr>
                                        <td>

                                            <form method="POST" action="{{url('/check-coupon')}}">
                                                @csrf
                                                <input type="text" class="form-control" name="coupon"
                                                       placeholder="Nhập mã giảm giá" style="width: 25%"><br>
                                                <input type="submit" class="btn btn-default check_coupon"
                                                       name="check_coupon" value="Tính mã giảm giá">

                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                <div style="margin-left: 620px; margin-bottom: 50px;">
                                    <p><strong>Tổng tiền: {{number_format($total,0,',','.')}}đ</strong></p>
                                    <p><strong>Giảm giá:0đ</strong></p>
                                    <p><strong>Thanh toán:{{number_format($total,0,',','.')}}đ</strong></p>
                                </div>


                            </form>

                            <div>
                                <h3 style="margin-bottom: 50px">THÔNG TIN ĐẶT HÀNG</h3>
                                <form>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 form-control-label">Họ tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name"
                                                   placeholder="Nhập đầy đủ họ tên..." required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 form-control-label">Điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="phone"
                                                   placeholder="0945028297">
                                        </div>
                                    </div>
                                    {{--                                                            <div class="form-group row">--}}
                                    {{--                                                                <label for="address" class="col-sm-2 form-control-label">Địa chỉ</label>--}}
                                    {{--                                                                <div class="col-sm-10">--}}
                                    {{--                                                                    <input type="text" class="form-control" id="address" placeholder="">--}}
                                    {{--                                                                </div>--}}
                                    {{--                                                            </div>--}}
                                    <form>
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 form-control-label">Chọn thành phố</label>
                                            <select name="city" id="city" class="col-sm-10">

                                                <option value="">--Chọn tỉnh thành phố--</option>
                                                @foreach($city as $key => $ci)
                                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 form-control-label">Chọn quận
                                                huyện</label>
                                            <select name="province" id="province" class="col-sm-10">
                                                <option value="">--Chọn quận huyện--</option>

                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 form-control-label">Chọn phường xã</label>
                                            <select name="wards" id="wards" class="col-sm-10">
                                                <option value="">--Chọn xã phường--</option>

                                            </select>
                                        </div>

                                        <input type="button" value="Tính phí vận chuyển" name="calculate_order"
                                               class="btn btn-primary btn-sm calculate_delivery">
                                    </form>

                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 form-control-label">Ghi chú</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="status"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            @if(Session::get('customer_id'))
                                                <a class="btn btn-primary btn_cart" href="{{url('/checkout')}}">Đặt
                                                    hàng</a>
                                            @else
                                                <a class="btn btn-primary btn_cart" href="{{url('/dang-nhap')}}">Đặt
                                                    hàng</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <tr>
            <td colspan="5">
                <center>
                    @php
                        echo 'Chưa có sản phẩm trong giỏ hàng';
                    @endphp
                </center>
            </td>
        </tr>
    @endif
@endsection

