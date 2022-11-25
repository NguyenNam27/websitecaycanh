<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class IntroduceController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_introduce(){
        $this->AuthLogin();
        $all_introduce = DB::table('tbl_introduces')
            ->orderBy('tbl_introduces.id','desc')->paginate(2);
        return view('admin.introduce.all_introduce',[
            'all_introduce'=>$all_introduce
        ]);
    }
    public function add_introduce(){
        $this->AuthLogin();
        return view('admin.introduce.add_introduce');
    }
    public function unactive_introduce($id){
        $this->AuthLogin();
        DB::table('tbl_introduces')->where('id',$id)->update(['introduce_status'=>1]);
        Session::put('message','Không kích hoạt bài giới thiệu thành công');
        return Redirect::to('all-introduce');

    }
    public function active_introduce($id){
        $this->AuthLogin();
        DB::table('tbl_introduces')->where('id',$id)->update(['introduce_status'=>0]);
        Session::put('message','Kích hoạt bài giới thiệu thành công');
        return Redirect::to('all-introduce');
    }

    public function save_introduce(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['title']= $request->title;
        $data['short_description']= $request->short_description;
        $data['content']= $request->input('content');
        $data['key_words']= $request->key_words;
        $data['introduce_status']= $request->introduce_status;

        DB::table('tbl_introduces')->insert($data);
        Session::put('message','Thêm bài giới thiệu thành công');
        return Redirect::to('/all-introduce');
    }
    public function edit_introduce($id){
        $edit_introduce = DB::table('tbl_introduces')->where('id',$id)->get();
        $manager_introduce = view('admin.introduce.edit_introduce')->with('edit_introduce',$edit_introduce);
        return view('admin_layout')->with('manager_post',$manager_introduce);
    }
    public function update_introduce(Request $request ,$id){
        $this->AuthLogin();
        $data = array();
        $data['title']= $request->title;
        $data['short_description']= $request->short_description;
        $data['content']= $request->input('content');
        $data['key_words']= $request->key_words;
        $data['introduce_status']= $request->introduce_status;

        DB::table('tbl_introduces')->where('id',$id)->update($data);
        Session::put('message','Chỉnh sửa bài viết thành công');
        return Redirect::to('/all-introduce');
    }
    public function delete_introduce($id){
        $this->AuthLogin();
        DB::table('tbl_introduces')->where('id',$id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('/all-introduce');
    }
}
