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
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
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
                            </form>

                            <div style="margin-left: 620px; margin-bottom: 50px;">
                                <p><strong>Tổng tiền: {{number_format($total,0,',','.')}}đ</strong></p>
                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']==1)
                                            Mã giảm : {{$cou['coupon_number']}} %
                                            <p>
                                                @php
                                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                                @endphp
                                            </p>
                                            <p>
                                                @php
                                                    $total_after_coupon = $total-$total_coupon;
                                                @endphp
                                            </p>
                                        @elseif($cou['coupon_condition']==2)

                                            Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
                                            <p>
                                                @php
                                                    $total_coupon = $total - $cou['coupon_number'];

                                                @endphp
                                            </p>
                                            @php
                                                $total_after_coupon = $total_coupon;
                                            @endphp
                                        @endif
                                        @if(Session::get('fee'))
                                            <li>
                                                Phí vận
                                                chuyển:<span>{{number_format(Session::get('fee'),0,',','.')}}đ</span>
                                            </li>
                                            <?php $total_after_fee = $total + Session::get('fee')
                                            ?>
                                        @endif

                                    @endforeach

                                @endif
                                <br>
                                <p>
                                    <strong> Thanh Toán:
                                        @php
                                            if(Session::get('fee') && !Session::get('coupon') ){
                                                    $total_after = $total_after_fee;
                                                    echo  number_format($total_after,0,',','.').'đ';
                                            }
                                            elseif (!Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    echo number_format($total_after,0,',','.').'đ';
                                            }
                                            elseif ( Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after + Session::get('fee');
                                                    echo number_format($total_after,0,',','.').'đ';
                                            }elseif (!Session::get('fee') && !Session::get('coupon')){
                                                     $total_after = $total;
                                                     echo number_format($total_after,0,',','.').'đ';
                                            }
                                        @endphp
                                    </strong>
                                </p>
                            </div>


                            @if(Session::get('cart'))
                                <tr>
                                    <td>

                                        <form method="POST" action="{{url('/check-coupon')}}">
                                            @csrf
                                            <input type="text" class="form-control" name="coupon"
                                                   placeholder="Nhập mã giảm giá" style="width: 25%"><br>
                                            <input type="submit" class="btn btn-primary check_coupon"
                                                   name="check_coupon" value="Tính mã giảm giá">
                                            @if(Session::get('coupon'))
                                                <a class="btn btn-primary check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                            @endif
                                        </form>
                                    </td>

                                </tr>
                            @endif
                            <br>
                            <form class="select_form">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-control-label">Chọn thành phố</label>
                                    <select name="city" id="city" class="col-sm-10 choose city"
                                            style="border: 1px solid #ced4da">

                                        <option value="" selected disabled>--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-control-label">Chọn quận
                                        huyện</label>
                                    <select name="province" id="province" class="col-sm-10 choose "
                                            style="border: 1px solid #ced4da">
                                        <option value="" selected disabled>--Chọn quận huyện--</option>

                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-control-label">Chọn phường xã</label>
                                    <select name="wards" id="wards" class="col-sm-10" style="border: 1px solid #ced4da">
                                        <option value="" selected disabled>--Chọn xã phường--</option>

                                    </select>
                                </div>

                                <input type="button" value="Tính phí vận chuyển" name="calculate_order"
                                       class="btn btn-primary btn-sm calculate_delivery">
                            </form>
                            <div>
                                <br>
                                <h3 style="margin-bottom: 50px;text-align: center">THÔNG TIN ĐẶT HÀNG</h3>
                                <?php
                                $customer_name = Session::get('customer_name');
                                $customer_email = Session::get('customer_email');
                                $customer_phone = Session::get('customer_phone');

                                ?>
                                <form method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"  class="col-sm-2 form-control-label">Họ tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{$customer_name}}" class="form-control shipping_name" name="shipping_name"
                                                   placeholder="Nhập đầy đủ họ tên..." required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{$customer_email}}" class="form-control shipping_email"
                                                   name="shipping_email"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 form-control-label">Điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{$customer_phone}}" class="form-control shipping_phone"
                                                   name="shipping_phone"
                                                   placeholder="Điện thoại">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 form-control-label">Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="shipping_address" readonly="readonly"
                                                   class="form-control shipping_address"
                                                   name="shipping_address" placeholder=" Địa chỉ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 form-control-label">Ghi chú</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control shipping_notes"
                                                      name="shipping_notes"></textarea>
                                        </div>
                                    </div>
                                    @if(Session::get('fee'))
                                        <input type="hidden" name="order_fee" class="order_fee"
                                               value="{{Session::get('fee')}}">
                                    @else
                                        <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                    @endif

                                    @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="order_coupon" class="order_coupon"
                                                   value="{{$cou['coupon_code']}}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                    @endif

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 form-control-label">Chọn hình thức thanh
                                            toán</label>
                                        <select name="payment_select"
                                                class="col-sm-10 payment_select">
                                            <option value="0">Qua chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-offset-2 col-sm-10" style="text-align: center">
                                            <button type="button" name="send_order"
                                                    class="btn btn-primary btn-cart send_order">Xác nhận đặt hàng
                                            </button>
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

