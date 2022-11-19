@extends('layout')
@section('content')
    <section class="clear"></section>
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tintuc_left">
                    <p class="tieude">TIN NỔI BẬT</p>
                    <div class="tintuc1">
                        <img class="tieude_img" src="Caycanh/img/tintuc_anh1.png" alt="">
                        <a href=""><p class="text_tintuc_left">Cây Kim Ngân hợp với tuổi nào?</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">24/11/2020</p>
                    </div>
                    <div class="tintuc1">
                        <img class="tieude_img" src="Caycanh/img/tintuc_anh1.png" alt="">
                        <a href=""><p class="text_tintuc_left">Cây Kim Ngân hợp với tuổi nào?</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">24/11/2020</p>
                    </div>
                    <div class="tintuc1">
                        <img class="tieude_img" src="Caycanh/img/tintuc_anh1.png" alt="">
                        <a href=""><p class="text_tintuc_left">Cây Kim Ngân hợp với tuổi nào?</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">24/11/2020</p>
                    </div>
                    <div class="tintuc1">
                        <img class="tieude_img" src="Caycanh/img/tintuc_anh1.png" alt="">
                        <a href=""><p class="text_tintuc_left">Cây Kim Ngân hợp với tuổi nào?</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">24/11/2020</p>
                    </div>
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
                        <table class="table table-hover" >
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Thành tiền</th>
                                <th>Quản lý</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr class="tr_text">
                                <td>1</td>
                                <td>Cây kim tiền</td>
                                <td><img src="Caycanh/img/tnb2.png" alt="" style="width: 100px"></td>
                                <td><input type="number" min="1" value="3" style="width: 50px; border: none;"></td>
                                <td>1.000.000đ</td>
                                <td>3.000.000đ</td>
                                <td><button type="button" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không')">Xóa</button></td>

                            </tr>
                            <tr class="tr_text">
                                <td>2</td>
                                <td>Cây kim tiền</td>
                                <td><img src="Caycanh/img/tnb2.png" alt="" style="width: 100px"></td>
                                <td><input type="number" min="1" value="3" style="width: 50px; border: none;"></td>
                                <td>1.000.000đ</td>
                                <td>3.000.000đ</td>
                                <td><button type="button" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không')">Xóa</button></td>

                            </tr>
                            <tr class="tr_text">
                                <td>3</td>
                                <td>Cây kim tiền</td>
                                <td><img src="Caycanh/img/tnb2.png" alt="" style="width: 100px"></td>
                                <td><input type="number" min="1" value="3" style="width: 50px; border: none;"></td>
                                <td>1.000.000đ</td>
                                <td>3.000.000đ</td>
                                <td><button type="button" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không')">Xóa</button></td>

                            </tr>
                            <tr class="tr_text">
                                <td>4</td>
                                <td>Cây kim tiền</td>
                                <td><img src="Caycanh/img/tnb2.png" alt="" style="width: 100px"></td>
                                <td><input type="number" min="1" value="3" style="width: 50px; border: none;"></td>
                                <td>1.000.000đ</td>
                                <td>3.000.000đ</td>
                                <td><button type="button" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không')">Xóa</button></td>

                            </tr>
                            <tr class="tr_text">
                                <td>5</td>
                                <td>Cây kim tiền</td>
                                <td><img src="Caycanh/img/tnb2.png" alt="" style="width: 100px"></td>
                                <td><input type="number" min="1" value="3" style="width: 50px; border: none;"></td>
                                <td>1.000.000đ</td>
                                <td>3.000.000đ</td>
                                <td><button type="button" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa không')">Xóa</button></td>

                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-left: 620px; margin-bottom: 50px;">
                            <p>Tổng tiền: 15.000.000đ</p>
                            <p>Giảm giá:0đ</p>
                            <p>Thanh toán:15.000.000đ</p>
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
