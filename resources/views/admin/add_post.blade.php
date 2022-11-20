@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm tin tức
                </header>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{route('savepost')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="title" class="form-control " id="slug" placeholder="Tên bài viết" onkeyup="ChangeToSlug();">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control " id="convert_slug" placeholder="Tên danh mục">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục tin tức</label>
                                <select name="" class="form-control input-sm m-bot15">
{{--                                    @foreach($brand as $key => $cate)--}}
{{--                                        <option value="{{$cate->brand_id}}">{{$cate->brand_name}}</option>--}}
{{--                                    @endforeach--}}

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả bài viết</label>
                                <textarea style="resize: none"  rows="5" class="form-control" name="short_description" id="ckeditor9" placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khoá tìm kiếm</label>
                                <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="key_word" class="form-control " placeholder="Từ khoá tìm kiếm" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Tin nổi bật </label>
                                <select class="form-control" name="hot_news">
                                    <option value="">--Chon--</option>
                                    <option value="1">Tin nổi bật</option>
                                    <option value="0">Không</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="content"  id="id5" placeholder="Nội dung bài viết"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>

                                </select>
                            </div>

                            <button type="submit" name="add_product" class="btn btn-info">Thêm bài viết</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection
