@extends('layout')
@section('content')
    <section class="clear"></section>
    <section class="container title-product">
        <div class="row ">
            <div class="col-md-3 col-8 title-product1">
                <img src="Caycanh/img/icon1.png" alt="">
                {{$category_title}}
                <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
            </div>
            <div class="col-md-9 col-4 title-product2">
                <div>
                    <a href="{{URL::to('/san-pham')}}">Xem tất cả</a>
                    <i class="fa fa-caret-right"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="clear"></section>
    <section class="container product">

        <div class="row">
            @foreach($hot_product_big as $big)
            <div class="col-md-3 d-none d-sm-block">
                <img src="{{asset('public/uploads/product/'.$big->product_image)}}" alt="" width="100%" height="100%">
            </div>
            @endforeach
            <div class="col-md-9">

                <div class="row">
                    @foreach($hot_product as $hot)
                    <div class="col-6 col-sm-6 col-md-3 pad">
                        <div class="img-thumbnail">


                                <div class=" hover-img">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$hot->product_id}}" class="cart_product_id_{{$hot->product_id}}">
                                        <input type="hidden" value="{{$hot->product_name}}" class="cart_product_name_{{$hot->product_id}}">

                                        <input type="hidden" value="{{$hot->product_quantity}}" class="cart_product_quantity_{{$hot->product_id}}">

                                        <input type="hidden" value="public/uploads/product/{{$hot->product_image}}" class="cart_product_image_{{$hot->product_id}}">
                                        <input type="hidden" value="{{$hot->product_price}}" class="cart_product_price_{{$hot->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$hot->product_id}}">
                                        <a href="{{URL::to('/chi-tiet/'.$hot->product_slug)}}"></a>
                                    <img src="{{asset('public/uploads/product/'.$hot->product_image)}}" alt="" width="100%" class="image">
                                    <div class="middle">
                                        <p>{{strip_tags($hot->product_desc)}}</p>
                                        <div class="btn-hover">
                                            <a href="{{URL::to('/chi-tiet/'.$hot->product_slug)}}"><p class="btn btn-primary btn-sm">Chi tiêt</p></a>
                                            <button type="button" class="btn btn-primary btn-sm add-to-cart " data-id_product="{{$hot->product_id}}">Mua ngay</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>


                                <div class="text-center">
                                    <h5>{{$hot->product_name}} </h5>
                                    <p class="price">{{number_format($hot->product_price)}} vnđ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

    </section>
    <section class="clear"></section>
    <section class="container title-product">
        <div class="row">
            <div class="col-md-3 col-8 title-product1">
                <img src="Caycanh/img/icon1.png" alt="">
                Cây trang trí trong nhà
                <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
            </div>
            <div class="col-md-9 col-4 title-product2">
                <div>
                    <a href="{{URL::to('/san-pham')}}">Xem tất cả</a>
                    <i class="fa fa-caret-right"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="clear"></section>
    <section class="container product">
        <div class="row">
            @foreach($hot_product_big2 as $big2)
            <div class="col-md-3 d-none d-sm-block">
                <img src="{{asset('public/uploads/product/'.$big2->product_image)}}" alt="" width="100%" height="100%">
            </div>
            @endforeach
            <div class="col-md-9">
                <div class="row">
                    @foreach($hot_product2 as $pro2)
                    <div class="col-6 col-sm-6 col-md-3 pad">
                        <div class="img-thumbnail">
                            <form action="">
                                @csrf
                                <input type="hidden" value="{{$pro2->product_id}}" class="cart_product_id_{{$pro2->product_id}}">
                                <input type="hidden" value="{{$pro2->product_name}}" class="cart_product_name_{{$pro2->product_id}}">

                                <input type="hidden" value="{{$pro2->product_quantity}}" class="cart_product_quantity_{{$pro2->product_id}}">

                                <input type="hidden" value="public/uploads/product/{{$pro2->product_image}}" class="cart_product_image_{{$pro2->product_id}}">
                                <input type="hidden" value="{{$pro2->product_price}}" class="cart_product_price_{{$pro2->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$pro2->product_id}}">
                            <a href="{{URL::to('/chi-tiet/'.$pro2->product_slug)}}">
                                <div class=" hover-img">
                                    <img src="{{asset('public/uploads/product/'.$pro2->product_image)}}" alt="" width="100%" class="image">
                                    <div class="middle">
                                        <p>{{strip_tags($pro2->product_desc)}}</p>
                                        <div class="btn-hover">
                                            <a href="{{URL::to('/chi-tiet/'.$pro2->product_slug)}}"><button class="btn btn-primary btn-sm">Chi tiêt</button></a>
                                            <button class="btn btn-primary btn-sm add-to-cart" >Mua ngay</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h5>{{$pro2->product_name}} </h5>
                                    <p class="price">{{number_format($pro2->product_price)}} vnđ</p>
                                </div>
                            </a>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="clear"></section>
    <section class="jumbotron">
        <div class="container">
            <h2 class="text-center" >TIN TỨC</h2><br>
            <div class="row">
                @foreach($blog as $blog)
                <div class="col-12 col-sm-6 col-md-3 pad">
                    <div class="img-thumbnail thumbnail1">
                        <img src="{{asset('public/uploads/post/'.$blog->image)}}" alt="" width="100%">
                        <div class="tintuc">
                           <a> <h5><strong>{{$blog->title}}</strong></h5></a>
                            <img src="Caycanh/img/icon2.png" alt=""> <small>{{$blog->created_at}}</small>
                            <p><small>{{strip_tags($blog->short_description)}} </small></p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <br>
            <div class="text-center">
                <button type="button" class="btn btn-light ">Xem thêm <i class="fa fa-caret-right caret1"></i></button>
            </div>
        </div>
    </section>
    <section class="clear"></section>
    <section class="jumbotron jumbotron1">
        <div class="container">
            <h2 class="text-center">Ý KIẾN KHÁCH HÀNG</h2><br>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 pad">
                    <div class="img-thumbnail ">
                        <p class="border1"><small>Mỗi loài hoa mang một thông điệp ý nghĩa mà bạn dành tặng cho người thân.Hoa lụa mà bạn dành tặng cho
                                người thân. Hoa lụa Phương Thảo xin giới thiệu ý nghĩa một số loài hoa thông dụng trong cuộc sống hàng ngày tới
                                các bạn. Hy vọng rằng nó sẽ giúp ích cho các bạn mỗi lần tặng hoa...</small></p>
                        <div class="row avata">
                            <div><img src="Caycanh/img/avata1.png" alt=""></div>
                            <div class="p-3">
                                <h5>Nguyễn Vân Anh</h5>
                                <p><small>Hà Nội</small></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-4 pad">
                    <div class="img-thumbnail ">
                        <p class="border1"><small>Mỗi loài hoa mang một thông điệp ý nghĩa mà bạn dành tặng cho người thân.Hoa lụa mà bạn dành tặng cho
                                người thân. Hoa lụa Phương Thảo xin giới thiệu ý nghĩa một số loài hoa thông dụng trong cuộc sống hàng ngày tới
                                các bạn. Hy vọng rằng nó sẽ giúp ích cho các bạn mỗi lần tặng hoa...</small></p>
                        <div class="row avata">
                            <div><img src="Caycanh/img/avata1.png" alt=""></div>
                            <div class="p-3">
                                <h5>Nguyễn Vân Anh</h5>
                                <p><small>Hà Nội</small></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-4 pad">
                    <div class="img-thumbnail ">
                        <p class="border1"><small>Mỗi loài hoa mang một thông điệp ý nghĩa mà bạn dành tặng cho người thân.Hoa lụa mà bạn dành tặng cho
                                người thân. Hoa lụa Phương Thảo xin giới thiệu ý nghĩa một số loài hoa thông dụng trong cuộc sống hàng ngày tới
                                các bạn. Hy vọng rằng nó sẽ giúp ích cho các bạn mỗi lần tặng hoa...</small></p>
                        <div class="row avata">
                            <div><img src="Caycanh/img/avata1.png" alt=""></div>
                            <div class="p-3">
                                <h5>Nguyễn Vân Anh</h5>
                                <p><small>Hà Nội</small></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
