<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$meta_title}}</title>
    <base href="{{asset("")}}">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>

    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

    <link rel="stylesheet" type="text/css" href="Caycanh/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="Caycanh/slick/slick-theme.css">

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

    <link rel="stylesheet" href="Caycanh/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.css">
    <link href="Caycanh/css/sweetalert.css" rel="stylesheet">

</head>
<body>
<section id="vt-top" class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
             <ul class="">
                <li><a href="tel:0395139875" title="Phone"><img src="Caycanh/img/phone.png" alt="Phone">
                        <span>Hotline:</span>
                        <span class="phone1">0395.139.875</span>
                    </a></li>
                {{--                <li><a href="" title="Facebook"><img src="Caycanh/img/f.png" alt="Facebook"></a></li>--}}
                {{--                <li><a href="" title="Twitter"><img src="Caycanh/img/t.png" alt="Twitter"></a></li>--}}

                <?php

                $customer_id = Session::get('customer_id');
                $customer_name = Session::get('customer_name');

                if($customer_id != NULL && $customer_name !=NULL){
                ?>
                <li><a href=""><img src=""> Xin ch??o: {{$customer_name}}</a></li>
                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> ????ng xu???t</a></li>

                <?php
                }else{
                ?>
                <li><a href="{{URL::to('/dang-nhap')}}" title="????ng nh???p">????ng Nh???p</a></li>

                <li><a href="{{URL::to('/dang-ky')}}" title="????ng k??">????ng K??</a></li>
                <?php
                }
                ?>


            </ul>
        </div>
    </div>
</section>
<section class="clear"></section>
<header class="container ">
    <div class="row">
        <div class="col-md-3 col-12 col-sm-6 flex-box">
            <div class="item">
                <img src="Caycanh/img/logo.png" alt="Logo c??y c???nh">
            </div>
        </div>
        <div class="col-md-3 col-12 col-sm-6 flex-box">
            <div class="item">
                <form action="{{URL::to('/tim-kiem')}}" method="POST" enctype="multipart/form-data" class="form-inline">

                        <div class="input-group mb-3">
                            @csrf
                            <input type="text" name="keywords_submit" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-info fa fa-search" name="search_items" type="submit"></button>
                            </div>

                        </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 col-12 col-sm-6 flex-box">
            <div class="item">
                <img src="Caycanh/img/hand1.png" alt="">
                CAM K???T CH???T L?????NG S???N PH???M D???CH V???
            </div>
        </div>
        <div class="col-md-3 col-12 col-sm-6 flex-box">
            <div class="item">
                <img src="Caycanh/img/hand2.png" alt="">
                V???N CHUY???N N???I TH??NH MI???N PH??
            </div>
        </div>
    </div>
</header>
<section class="clear"></section>
<section id="vt-nav" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-block ">
                <div class="danh-muc">
                    <i class="fas fa-bars"></i>
                    DANH M???C S???N PH???M
                </div>
            </div>
            <div class="col-md-9">
                <nav class="navbar navbar-expand-sm navbar-dark ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/')}}">Trang ch???</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Gi???i thi???u</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/san-pham')}}">S???n ph???m</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/tin-tuc')}}">Tin t???c</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/lien-he')}}">Li??n h???</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">D???ch v???</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">H??? tr??? kh??ch h??ng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/gio-hang')}}">Gi??? h??ng</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="clear"></section>
<section class="container d-none d-sm-block">
    <div class="row">
        <div class="col-md-3 menu-trai">
            <ul>
                @foreach($category as $cate)
                    <li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}"><img
                                src="Caycanh/img/icon_mnuL.png" alt=""> {{$cate->category_name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9 banner">

            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    ?>
                    @foreach($slider as $slide)
                        <?php
                        $i++;
                        ?>
                        <div class="carousel-item {{ $i==1 ? 'active' : '' }} ">
                            <img src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" alt="">
                        </div>

                    @endforeach
                </div>


            </div>

        </div>
    </div>
</section>

@yield('content')

<footer id="footer">

    <nav class="navbar navbar-expand-sm vt-footer">
        <div class="container">
            <ul class="navbar-nav mr-auto footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/')}}">Trang ch???</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/gioi-thieu')}}">Gi???i thi???u</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/san-pham')}}">S???n ph???m</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">D???ch v???</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/tin-tuc')}}">Tin t???c</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/lien-he')}}">Li??n h???</a>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link " href="#">K???t n???i v???i ch??ng t??i:</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fa fa-facebook fa-icon " href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fa fa-twitter fa-icon " href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fa fa-google fa-icon " href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fa fa-youtube fa-icon " href="#"></a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container footer1">
        <div class="row ">
            <div class="col-md-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2166.4609806293047!2d105.74409296897059!3d21.05981484641116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134559245a2c80d%3A0x73854675d5f1a78c!2zMjUgxJDGsOG7nW5nIFBow7ogTWluaCwgVOG7lSBkw6JuIHBo4buRIFbEg24gVHLDrCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpIDEwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1606185047137!5m2!1svi!2s"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <h5>NH?? V?????N V??N TH???Y</h5>
                <p><i class="fa fa-map-marker"></i> ?????a ch???: 25 ???????ng Ph?? Minh, V??n Tr??, Minh Khai,B???c T??? Li??m, H?? N???i
                </p>
                <p><i class="fa fa-phone"></i> Hotline: 093 6596 425 (Mrs.Th???y) - 0976885796 (Mr.L??m)</p>
                <p><i class="fa fa-envelope"></i> Email: buoidienvn@gmail.com</p>
                <p><i class="fa fa-globe"></i> Website: buoidien.vn</p>
                <p><i class="fa fa-copyright"></i> Copyright 2013. B???n quy???n thu???c v??? Nh?? V?????n V??n Th???y</p>
            </div>
            <div class="col-md-3">
                <div class="fb-page" data-href="https://www.facebook.com/beatvn.network" data-tabs="" data-width="500"
                     data-height="180" data-small-header="false" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/beatvn.network" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/beatvn.network">Beatvn</a></blockquote>
                </div>
            </div>
        </div>
    </div>


</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="Caycanh/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="Caycanh/js/js.js" type="text/javascript"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0"
        nonce="O1u2nPsT"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.js"></script>
<script src="Caycanh/js/sweetalert.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>--}}
<script>
    $(function () {
        $('.select_form').change(function (){
            var display= $('.select_form option:selected').text();
            $('#shipping_address').val(display);
        });
    })

</script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.add-to-cart').click(function () {

            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('L??m ??n ?????t nh??? h??n ' + cart_product_quantity);
            } else {

                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price, cart_product_qty: cart_product_qty,
                        _token: _token,
                        cart_product_quantity: cart_product_quantity
                    },
                    success: function (data) {
                        swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location.href = "{{url('/gio-hang')}}";
                            });


                    }

                });
            }


        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.calculate_delivery').click(function () {
            var matp = $('#city').val();
            var maqh = $('#province').val();
            var xaid = $('#wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' && maqh == '' && xaid == '') {
                alert('L??m ??n ch???n ????? t??nh ph?? v???n chuy???n');
            } else {
                $.ajax({
                    url: '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data: {matp: matp, maqh: maqh, xaid: xaid, _token: _token},
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">

    $(document).ready(function(){
        $('.send_order').click(function(){
            swal({
                    title: "X??c nh???n ????n h??ng",
                    text: "????n h??ng s??? kh??ng ???????c ho??n tr??? khi ?????t,b???n c?? mu???n ?????t kh??ng?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "C???m ??n, Mua h??ng",

                    cancelButtonText: "????ng,ch??a mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{
                                shipping_email:shipping_email,
                                shipping_name:shipping_name,
                                shipping_address:shipping_address,
                                shipping_phone:shipping_phone,
                                shipping_notes:shipping_notes,
                                _token:_token,order_fee:order_fee,
                                order_coupon:order_coupon,
                                shipping_method:shipping_method
                            },
                            success:function(){
                                swal("????n h??ng", "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng", "success");
                            }
                        });

                        window.setTimeout(function(){
                            location.reload();
                        } ,3000);

                    } else {
                        swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");

                    }

                });


        });
    });


</script>

</body>
</html>
