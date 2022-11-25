@extends('layout')
@section('content')


    <section class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tintuc_left">
                    <p class="tieude">TIN NỔI BẬT</p>
                    <div class="tintuc1">
                        @foreach($hot_news as $new)
                            <a href="{{URL::to('/details_post/'.$new->slug)}}"><img class="tieude_img" src="{{asset('public/uploads/post/'.$new->image)}}" alt=""></a>
                            <a href="{{URL::to('/details_post/'.$new->slug)}}"><p class="text_tintuc_left">{{$new->title}}</p></a>
                            <p class="sanp1"><img class="icon_tintuc" src="Caycanh/img/icon_tintuc1.png" alt="">{{$new->created_at}}</p>
                        @endforeach
                    </div>

                </div>
            </div>


            <div class="col-md-9 tintuc_right mg-gthieu">

                <section class="container ">
                    @foreach($details_post as $details)
                    <div class="new__title">
                        <h3><strong>{{$details->title}}</strong></h3>
                        <span><strong>NOTICE</strong></span>
                        <span>|</span>
                        <span> <strong><i class="fa-regular fa-clock"></i> {{$details->created_at}}</strong></span>
                    </div>
                    <div class="new__info">
                        <p>{!! strip_tags($details->short_description) !!}</p>
                        <p>{!! strip_tags($details->content) !!}</p>

                    </div>
                    @endforeach
                </section>
            </div>
        </div>
    </section>


@endsection
