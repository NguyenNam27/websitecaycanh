@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài giới thiệu
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
                        <form role="form" action="{{URL::to('/save-introduce')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề bài giới thiệu</label>
                                <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="title" class="form-control " id="slug" placeholder="Tên bài viết" onkeyup="ChangeToSlug();">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả bài viết</label>
                                <textarea style="resize: none"  rows="5" class="form-control" name="short_description" id="ckeditor12" placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khoá tìm kiếm</label>
                                <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 5 ký tự" name="key_words" class="form-control " placeholder="Từ khoá tìm kiếm" >
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="content"  id="ckeditor13" placeholder="Nội dung bài viết"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="introduce_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>

                            <button type="submit" name="add_product" class="btn btn-info">Thêm bài giới thiệu</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
@endsection

