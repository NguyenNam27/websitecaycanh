@extends('layout')
@section('content')
    <section class="clear"></section>
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tintuc_left">
                    <p class="tieude">TIN NỔI BẬT</p>
                    @foreach($hot_news as $new)
                        <a href="{{URL::to('/details_post/'.$new->slug)}}"><img class="tieude_img"
                                                                                src="{{asset('public/uploads/post/'.$new->image)}}"
                                                                                alt=""></a>
                        <a href="{{URL::to('/details_post/'.$new->slug)}}"><p
                                class="text_tintuc_left">{{$new->title}}</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png"
                                              alt="">{{$new->created_at}}</p>
                    @endforeach

                </div>
            </div>


            <div class="col-md-9">
                <div class="row mg-gthieu">
                    <section class="container title-product">
                        <div class="row ">
                            <div class="col-md-3 col-8 title-product1">
                                <img src="Caycanh/img/icon1.png" alt="">
                                Giới Thiệu
                                <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
                            </div>
                        </div>

                    </section>
                    <div class="row gt">
                        @foreach($introduce as $value)
{{--                            {{dd($value)}}--}}
                            <div class="new__title">
                                <h3><strong>{{$value->title}}</strong></h3>
                                <span><strong>NOTICE</strong></span>
                                <span>|</span>
                                <span> <strong><i class="fa-regular fa-clock"></i> {{$value->created_at}}</strong></span>
                            </div>
                            <div class="new__info">
                               <p>{!! $value->short_description !!}</p>
                               <p>{!! $value->content !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
