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
                        @foreach($edit_introduce as $key =>$edit)
                            <form role="form" action="{{URL::to('/update-introduce/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài giới thiệu mới</label>
                                    <input type="text" value="{{$edit->title}}" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="title" class="form-control " id="slug" placeholder="Tên bài viết" onkeyup="ChangeToSlug();">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả bài viết</label>
                                    <textarea style="resize: none"  rows="5" class="form-control" name="short_description" id="ckeditor14" placeholder="Mô tả sản phẩm">{{$edit->short_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Từ khoá tìm kiếm</label>
                                    <input type="text" value="{{$edit->key_words}}" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="key_words" class="form-control " placeholder="Từ khoá tìm kiếm" >
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="content"  id="ckeditor15" placeholder="Nội dung bài viết">{{$edit->content}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="introduce_status" class="form-control input-sm m-bot15">
                                        <option value="{{$edit->id}}" {{($edit->introduce_status ==0 ) ? 'selected' : '' }}>{{($edit->introduce_status ==0 ) ? 'Hiển thị' : 'Ẩn' }}</option>
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>

                                    </select>
                                </div>

                                <button type="submit"  class="btn btn-info">Chỉnh sửa </button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
@endsection
