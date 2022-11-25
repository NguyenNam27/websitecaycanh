@extends('layout')
@section('content')
    @foreach($details_product as $details)
        <section class="container sanphamchitiet">

            <div class="row">
                <div class="col-md-4 fotorama" data-nav="thumbs">

                    <img src="{{asset('public/uploads/product/'.$details->product_image)}}" width="200px">
                    {{--                <img src="https://s.fotorama.io/2.jpg" width="200px">--}}
                    {{--                <img src="https://s.fotorama.io/2.jpg" width="200px">--}}
                    {{--                <img src="https://s.fotorama.io/2.jpg" width="200px">--}}


                </div>
                <div class="col-md-8 text-justify">
                    <h3>{{$details->product_name}}</h3>
                    <ul class="spchitiet">
                        <li>Mã sản phẩm: <small>{{$details->product_id}}</small></li>
                        <li>Tình trạng: <small>Còn hàng</small></li>
                    </ul>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <p>Giá bán:</p>
                        </div>
                        <div class="col-md-3 col-6">
                            <p>Số lượng:</p>
                        </div>
                    </div>
                    <form {{URL::to('/save-cart')}}" method="POST">
                    @csrf
                    <div class="row">

                        <input type="hidden" value="{{$details->product_id}}"
                               class="cart_product_id_{{$details->product_id}}">

                        <input type="hidden" value="{{$details->product_name}}"
                               class="cart_product_name_{{$details->product_id}}">

                        <input type="hidden" value="public/uploads/product/{{$details->product_image}}"
                               class="cart_product_image_{{$details->product_id}}">

                        <input type="hidden" value="{{$details->product_quantity}}"
                               class="cart_product_quantity_{{$details->product_id}}">

                        <input type="hidden" value="{{$details->product_price}}"
                               class="cart_product_price_{{$details->product_id}}">

                        <div class="col-md-3 col-6">
                            <h2> {{number_format($details->product_price)}} đ</h2>
                        </div>
                        <div class="col-md-3 col-6">

                            <input type="number" name="qty" class="cart_product_qty_{{$details->product_id}}" min="1"
                                   value="1" size="50%">
                            <input name="productid_hidden" type="hidden" value="{{$details->product_id}}"/>

                        </div>
                        <div class="col-md-3">
                            {{--                        <button type="button" class="btn btn-success add-to-cart"><i class="fa fa-shopping-cart "></i> Đặt hàng</button>--}}
                            <button type="button" class="btn btn-primary btn-sm add-to-cart "
                                    data-id_product="{{$details->product_id}}" name="add-to-cart">Đặt hàng
                            </button>
                        </div>


                    </div>
                    </form>
                    <hr>
                    <p>MÔ TẢ NGẮN</p>
                    <p><small>{!! strip_tags($details->product_desc) !!}</small></p>
                    <hr>
                    {{--                <p>Tag:<a href="">cây bím tóc,</a><a href="">cây cảnh kim ngân,</a><a href="">giá cây kim ngân,</a><a href="">kim ngân.</a></p>--}}
                    {{--                <br>--}}

                    <ul class="nav social">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Thích</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-primary">Chia sẻ</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-info"><i class="fa fa-twitter"></i> Tweet</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <button class="btn btn-danger">Save</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">
                                <button class="btn btn-link"><i class="fa fa-google-plus-g"></i></button>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </section>
        <section class="clear"></section>
        <section class="container ">
            <ul class="nav nav-pills font-weight-bold" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#thongtinsanpham">THÔNG TIN SẢN PHẨM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#danhgia">ĐÁNH GIÁ</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="thongtinsanpham" class="container tab-pane active"><br>
                    <div>
                        <p class="text-justify">{!! strip_tags($details->product_content) !!}</p>
                    </div>

                </div>
                <div id="danhgia" class="container tab-pane fade"><br>
                    <h3>Đánh giá</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>

            </div>
        </section>
    @endforeach
    <section class="container title-product">
        <div class="row">
            <div class="col-md-3 col-8 title-product1">
                <img src="Caycanh/img/icon1.png" alt="">
                Sản phẩm liên quan
                <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
            </div>
            <div class="col-md-9 col-4 title-product2">

            </div>
        </div>
    </section>

    <section class="regular slider container">
        @foreach($related_product as $relate)
            <div class="img-thumbnail">
                <a href="{{URL::to('/chi-tiet/'.$relate->product_slug)}}">
                    <img src="{{asset('public/uploads/product/'.$relate->product_image)}}">
                    <div class="text-center">
                        <h5 class="text-black-50">{{$relate->product_name}} </h5>
                        <p class="price">{{number_format($relate->product_price)}}đ</p>
                    </div>
                </a>
            </div>
        @endforeach

    </section>
@endsection
