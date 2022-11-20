@extends('layout')
@section('content')
    <section class="clear"></section>
    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tintuc_left">
                    <p class="tieude">TIN NỔI BẬT</p>

                    <div class="tintuc1">
                        @foreach($hot_news as $new)
                        <img class="tieude_img" src="{{asset('public/uploads/post/'.$new->image)}}" alt="">
                        <a href=""><p class="text_tintuc_left">{{$new->title}}</p></a>
                        <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">{{$new->created_at}}</p>
                        @endforeach
                    </div>

                </div>
            </div>


            <div class="col-md-9 tintuc_right mg-gthieu">

                <section class="container ">
                    <div class="row title-product ">
                        <div class="col-md-4 col-8 title-product1">
                            <img src="Caycanh/img/icon1.png" alt="">
                            Tin Tức
                            <img src="Caycanh/img/icon_section1.png" alt="" class="icon-arrow">
                        </div>

                    </div>
                    @foreach($all_blog as $all)
                    <div class="row ">
                        <div class="col-md-4 tintuc2_right">
                            <a href=""> <img  src="{{asset('public/uploads/post/'.$all->image)}}" alt="" width="100%" height="100%"></a>
                        </div>
                        <div class="col-md-8 tintuc2_right">
                            <a href="" class="text_tintuc2_right">{{$all->title}} </a>
                            <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">{{$all->created_at}}</p>
                            <a href="" class="text2_tintuc2_right">{{strip_tags($all->short_description)}}</a>

                        </div>

                    </div>
                    @endforeach
                    <div class="row" style="margin-top: 28px;">
                        <div class="container">
                            <div class="row">
                                <ul class="pagination">
                                {{$all_blog->links()}}

                                </ul>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
