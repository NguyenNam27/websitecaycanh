@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa bài viết
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
                        @foreach($edit_post as $key =>$edit)
                        <form role="form" action="{{route('updatepost',['id'=>$edit->id])}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết mới</label>
                                <input type="text" value="{{$edit->title}}" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="title" class="form-control " id="slug" placeholder="Tên bài viết" onkeyup="ChangeToSlug();">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="{{$edit->slug}}" name="slug" class="form-control " id="convert_slug" placeholder="Tên danh mục">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục tin tức</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
{{--                                    @foreach($brand as $key => $cate)--}}
{{--                                        @if($cate->brand_id==$edit->brand_id)--}}
{{--                                        <option selected value="{{$cate->brand_id}}">{{$cate->brand_name}}</option>--}}
{{--                                        @else--}}
{{--                                            <option value="{{$cate->brand_id}}">{{$cate->brand_name}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" alt="Chọn ảnh mới">
                                <img src="{{URL::to('public/uploads/post/'.$edit->image)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả bài viết</label>
                                <textarea style="resize: none"  rows="5" class="form-control" name="short_description" id="ckeditor10" placeholder="Mô tả sản phẩm">{{$edit->short_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khoá tìm kiếm</label>
                                <input type="text" value="{{$edit->key_word}}" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="key_word" class="form-control " placeholder="Từ khoá tìm kiếm" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Tin nổi bật </label>
                                <select class="form-control" name="hot_news">
                                    <option value="">{{($edit->hot_news == 1) ? 'Tin nổi bật' : 'không' }}</option>
                                    <option value="1">Tin nổi bật</option>
                                    <option value="0">Không</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="content"  id="ckeditor11" placeholder="Nội dung bài viết">{{$edit->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>

                                </select>
                            </div>

                            <button type="submit"  class="btn btn-info">Chỉnh sửa bài viết</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
@endsection

