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


            <div class="col-md-9 tintuc_right mg-gthieu">
                <section class="container ">
                    <div class="row title-product ">
                        <div class="col-md-4 col-8 title-product1">
                            <img src="Caycanh/img/icon1.png" alt="">
                            Tất cả sản phẩm
                            <img src="" alt="" class="icon-arrow">
                        </div>
                        <div class="col-md-8">

                        </div>
                    </div>
                    <div class="row sanpham">
                        @foreach($all_product as $all)
{{--                            {{dd($all)}}--}}
                        <div class="col-6 col-sm-6 col-md-3 pad cp_sanpham">
                            <form action="{{URL::to('/save-cart')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$all->product_id}}" class="cart_product_id_{{$all->product_id}}">
                                <input type="hidden" value="{{$all->product_name}}" class="cart_product_name_{{$all->product_id}}">

                                <input type="hidden" value="{{$all->product_quantity}}" class="cart_product_quantity_{{$all->product_id}}">

                                <input type="hidden" value="public/uploads/product/{{$all->product_image}}" class="cart_product_image_{{$all->product_id}}">
                                <input type="hidden" value="{{$all->product_price}}" class="cart_product_price_{{$all->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$all->product_id}}">
                            <div class="img-thumbnail">
                                <a href="{{URL::to('/chi-tiet/'.$all->product_slug)}}">
                                    <div class=" hover-img">
                                        <img src="{{asset('public/uploads/product/'.$all->product_image)}}" alt="" width="100%" class="image">
                                        <div class="middle">
                                            <p>{{strip_tags($all->product_desc)}}</p>

                                            <div class="btn-hover">
                                                <a href="{{URL::to('/chi-tiet/'.$all->product_slug)}}"><p class="btn btn-primary btn-sm">Chi tiêt</p></a>
                                                <button type="submit" class="btn btn-primary btn-sm add-to-cart" >Mua ngay</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h5>{{$all->product_name}} </h5>
                                        <p class="price">{{number_format($all->product_price)}} vnđ</p>
                                    </div>
                                </a>
                            </div>
                            </form>
                        </div>
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><<</a></li>

                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">>></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
