@extends('layout')
@section('content')
    <section class="clear"></section>
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
                    <?php
                        $content = Cart::content();
                    ?>
                </div>
                <div class="row tab_cart">
                    <div class="col-md-12 col-12">
                        <h3 style="margin-bottom: 30px">Giỏ hàng của bạn</h3>

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
                            @foreach($content as $key =>$value)
                            <tr class="tr_text_{{$value->id}}">
                                <td>{{$value->name}}</td>
                                <td><img src="{{asset('public/uploads/product/'.$value->options->image)}}" alt="" style="width: 100px"></td>
                                <td>
                                    <form action="{{URL::to('update-cart-quantity')}}" method="POST">
                                        @csrf
                                    <input class="cart_quantity_input" name="cart_quantity" type="text"  value="{{$value->qty}}" style="width: 50px; border: none;" >
                                        <input type="hidden" value="{{$value->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                    </form>
                                </td>
                                <td>{{number_format($value->price)}}đ</td>
                                <td>{{number_format($value->qty*$value->price,0,",",",")}}đ</td>
                                <td><a href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"  class="btn btn-danger" >Xóa</a></td>

                            </tr>
@                           @endforeach
                            </tbody>
                        </table>
                        <div style="margin-left: 620px; margin-bottom: 50px;">
                            <p>Tổng tiền: {{Cart::total()}}đ</p>
                            <p>Giảm giá:0đ</p>
                            <p>Thanh toán:{{Cart::total()}}đ</p>
                        </div>

                        <div>
                            <h3 style="margin-bottom: 50px">THÔNG TIN KHÁCH HÀNG</h3>
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 form-control-label">Họ tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" placeholder="Nhập đầy đủ họ tên..." required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 form-control-label">Điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="phone" placeholder="0945028297">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 form-control-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 form-control-label">Ghi chú</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control"  id="status"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary btn_cart">Đặt hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
