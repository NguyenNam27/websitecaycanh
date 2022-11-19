@extends('layout')
@section('content')
    @foreach($details_product as $details)
    <section class="container sanphamchitiet">

        <div class="row">
            <div class="col-md-4 fotorama" data-nav="thumbs" >

                <img src="https://s.fotorama.io/1.jpg" width="200px">
                <img src="https://s.fotorama.io/2.jpg" width="200px">
                <img src="https://s.fotorama.io/2.jpg" width="200px">
                <img src="https://s.fotorama.io/2.jpg" width="200px">


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
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h2> {{number_format($details->product_price)}} đ</h2>
                    </div>
                    <div class="col-md-3 col-6">
                        <input type="number" class="form-control" min="1" value="1" size="50%">
                    </div>
                    <div class="col-md-3">

                        <button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
                    </div>
                </div>
                <hr>
                <p>MÔ TẢ NGẮN</p>
                <p><small>{{strip_tags($details->product_desc)}}</small></p>
                <hr>
                <p>Tag:<a href="">cây bím tóc,</a><a href="">cây cảnh kim ngân,</a><a href="">giá cây kim ngân,</a><a href="">kim ngân.</a></p>
                <br>

                <ul class="nav social">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><button class="btn btn-primary"><i class="fa fa-thumbs-up"></i> Thích</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><button class="btn btn-primary">Chia sẻ</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><button class="btn btn-info"><i class="fa fa-twitter"></i> Tweet</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><button class="btn btn-danger">Save</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><button class="btn btn-link"><i class="fa fa-google-plus-g"></i></button></a>
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
                    <p class="text-justify">Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Eius quidem consequatur optio aspernatur, quas quod dolor laudantium mollitia ad asperiores delectus et aut hic doloribus doloremque nisi tenetur saepe! Eum nam, deleniti a facere, nostrum ipsum! Eligendi eius, veritatis sint enim quaerat corrupti alias, optio similique commodi molestiae cumque quasi eaque soluta doloribus ducimus molestias recusandae facilis voluptate, minima. Doloremque non, nisi? Sapiente provident neque nobis veritatis repellendus deserunt facilis ullam iure ducimus reiciendis, tenetur veniam beatae expedita maxime ex rem, illum error deleniti totam nulla eum dolores itaque labore reprehenderit? Ex numquam quaerat tempore cum perspiciatis dolorem quod laboriosam.</p>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Đặc điểm của cây kim ngân</h4>
                        <br>
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Tempore impedit unde velit nulla inventore blanditiis illo deleniti officiis, neque autem veniam iusto quibusdam nostrum sed aut qui harum quisquam porro natus nam. Voluptas provident recusandae amet debitis vel sunt velit distinctio, tempore consequatur voluptatibus veniam. Aliquam optio a, animi similique vero, rem nisi ratione, dolor perferendis totam provident. Ad reprehenderit, assumenda, veniam consequuntur molestiae dignissimos nihil quo? Esse adipisci dolorem officia. Fuga, sunt vel! Temporibus soluta voluptatibus dolorem, illum labore.</p>

                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum corrupti inventore culpa temporibus, facilis minima tempora recusandae ullam excepturi. Maiores, temporibus iusto! Dolores accusantium corporis sequi ut quia quos dolore. Consectetur, expedita, qui aliquid neque dolor eligendi, molestias nulla a, officia reiciendis porro. Et deleniti eum qui, iure necessitatibus corrupti!</p>

                    </div>
                    <div class="col-md-6">
                        <img class="img-thumbnail" src="Caycanh/img/tnb1.png" alt="" width="100%" style="height: 90%">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <img class="img-thumbnail" src="Caycanh/img/tnb1.png" alt="" width="100%" style="height: 90%">
                    </div>
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Cách chăm sóc và ý nghĩa của cây kim ngân</h4>
                        <br>
                        <h6 class="text-justify font-weight-bold">Nhiệt độ:</h6>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum corrupti inventore culpa temporibus, facilis minima tempora recusandae ullam excepturi. Maiores, temporibus iusto! Dolores accusantium corporis sequi ut quia quos dolore. Consectetur, expedita, qui aliquid neque dolor eligendi, molestias nulla a, officia reiciendis porro.</p>

                        <h6 class="text-justify font-weight-bold">Ánh sáng:</h6>
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum corrupti inventore culpa temporibus, facilis minima tempora recusandae ullam excepturi. Maiores, temporibus iusto! Dolores accusantium corporis sequi ut quia quos dolore. Consectetur, expedita, qui aliquid neque dolor eligendi, molestias nulla a, officia reiciendis porro.</p>

                    </div>
                </div>
            </div>
            <div id="danhgia" class="container tab-pane fade"><br>
                <h3>Đánh giá</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
