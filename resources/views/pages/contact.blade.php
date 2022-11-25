@extends('layout')
@section('content')
    <section class="clear"></section>
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tintuc_left">
                    <p class="tieude">TIN NỔI BẬT</p>
                    @foreach($hot_news as $new2)
                        <a href="{{URL::to('/details_post/'.$new2->slug)}}"><img class="tieude_img" src="{{asset('public/uploads/post/'.$new2->image)}}" alt=""></a>
                        <a href="{{URL::to('/details_post/'.$new2->slug)}}"><p class="text_tintuc_left">{{$new2->title}}</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="" alt="">{{$new2->created_at}}</p>
                    @endforeach
                </div>
            </div>


            <div class="col-md-9">
                <div class="row mg-gthieu">
                    <section class="container title-product">
                        <div class="row ">
                            <div class="col-md-3 col-8 title-product1">
                                <img src="Caycanh/img/icon1.png" alt="">
                                Liên hệ
                                <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
                            </div>
                        </div>

                    </section>
                    <div class="row title-contact">
                        <div class="col-md-6">
                            <p>Mọi ý kiến phản hồi, than phiền hay khiếu lại xin lòng gửi về cho chúng tôi. Chúng tôi xin cám ơn quý khách hàng !
                            </p>
                            <div>
                                <form action="">

                                    <table class="table table-inverse" >



                                        <tr>
                                            <td>Họ Tên <span class="star">*</span></td>
                                            <td class=" inp"><i class="fa fa-user icon"></i> <input  type="text" name="" id="name" required="" placeholder=""></td>
                                        </tr>
                                        <tr>
                                            <td>Email<span class="star">*</span></td>
                                            <td  class=" inp"><i class="fa fa-envelope icon"></i> <input  type="text" name="" id="email" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ<span class="star">*</span></td>
                                            <td  class=" inp"><i class="fa fa-address-book icon" ></i> <input  type="text" name="" id="address" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại<span class="star">*</span></td>
                                            <td class=" inp"><i class="fa fa-fax icon"></i> <input   type="text" name="" id="phone" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Tiêu đề<span class="star">*</span></td>
                                            <td class="inp"><div><i class="fas fa-file icon"></i> <input type="text" name="title" id="title" required=""></div></td>
                                        </tr>
                                        <tr>
                                            <td>Nội dung<span class="star">*</span></td>
                                            <td><textarea style="width: 190px;"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center"> <button type="submit" class="btn btn-success">Gửi đi</button> <button type="reset" class="btn btn-dark">Nhập lại</button></td>

                                        </tr>

                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 title-product ">
                            <img src="Caycanh/img/logo.png" alt="" id="logo_contact">
                            <div id="noidung" >
                                <h3 id="name_vuon" >Nhà Vườn Hưng Thịnh</h3>
                                <p>Địa chỉ:Số 54 Triều Khúc, Thanh Xuân, Hà Nội</p>
                                <p>Hotline: 0987654321(Mr.Thịnh)-0123456789(Mr.Hưng)</p>
                                <p>Email:hungthinh6886@gmail.com</p>
                                <p>Website: <a href="https://www.w3schools.com/">https://www.w3schools.com/</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
