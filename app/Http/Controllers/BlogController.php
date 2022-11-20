<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use ReCaptcha\RequestMethod\Post;
use Session;
session_start();


class BlogController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_post(){
        $this->AuthLogin();
        $all_post = DB::table('tbl_posts')
                    ->where('post_status','0')
                    ->orderBy('tbl_posts.brand_id','desc')->paginate(2);
        return view('admin.all_post',[
            'all_post'=>$all_post
        ]);
    }
    public function add_post(){
        $this->AuthLogin();
        $brand = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('admin.add_post',[
            'brand'=>$brand
        ]);
    }

    public function unactive_post($id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('id',$id)->update(['post_status'=>1]);
        Session::put('message','Không kích hoạt bài viết thành công');
        return Redirect::to('all-post');

    }
    public function active_post($id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('id',$id)->update(['post_status'=>0]);
        Session::put('message','Kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }
    public function save_post(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['title']= $request->title;
        $data['slug']= $request->slug;
        $data['brand_id']= $request->brand_id;
        $data['short_description']= $request->short_description;
        $data['content']= $request->input('content');
        $data['key_word']= $request->key_word;
        $data['hot_news']= $request->hot_news;

        $data['post_status']= $request->post_status;
        $get_image = $request->file('image');

        if ($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $data['image']= $new_image;
            DB::table('tbl_posts')->insert($data);
            Session::put('message','Thêm bài viết thành công');
            return redirect()->route('allpost');
        }
        $data['image']='';
        DB::table('tbl_posts')->insert($data);
        Session::put('message','Thêm bài viết thành công');
        return redirect()->route('allpost');
    }
    public function edit_post($id){
        $edit_post = DB::table('tbl_posts')->where('id',$id)->get();
//        dd($edit_post);
//        $edit_post = Post::find($id);

        $brand = DB::table('tbl_brand')->orderBy('brand_id','desc')->get();

        $manager_post = view('admin.edit_post')->with('edit_post',$edit_post)->with('brand',$brand);
        return view('admin_layout')->with('manager_post',$manager_post);
    }
    public function update_post(Request $request ,$id){
        $this->AuthLogin();
        $data = array();
        $data['title']= $request->title;
        $data['slug']= $request->slug;
        $data['brand_id']= $request->brand_id;
        $data['short_description']= $request->short_description;
        $data['content']= $request->input('content');
        $data['key_word']= $request->key_word;
        $data['post_status']= $request->post_status;
        $get_image = $request->file('image');

        if ($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $data['image']= $new_image;
            DB::table('tbl_posts')->where('id',$id)->update($data);

            Session::put('message','Chỉnh sửa bài viết thành công');
            return redirect()->route('allpost');
        }
        $data['image']='';
        DB::table('tbl_posts')->where('id',$id)->update($data);
        Session::put('message','Chỉnh sửa bài viết thành công');
        return redirect()->route('allpost');
    }
    public function delete_post($id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('id',$id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return redirect()->route('allpost');
    }

}
