<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function error_page(){
        return view('errors.404');
    }
//    public function send_mail(){
//         //send mail
//                $to_name = "NguyenNgocNam_PM23.01";
//                $to_email = "nguyenngocnam00770@gmail.com";//send to this email
//
//
//                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
//
//                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
//
//                    $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
//                    $message->from($to_email,$to_name);//send from this mail
//                });
////                 return redirect('/')->with('message','');
//                //--send mail
//    }

    public function index(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $category_title = "Sản phẩm bán chạy nhất";
        $url_canonical = $request->url();
        //--seo
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // SẢN PHẨM BÁN CHẠY
        $hot_product_big = DB::table('tbl_category_product')
            ->where([['category_id','19'],['category_status','0']])
            ->orderby(DB::raw('RAND()'))
            ->limit(1)
            ->get();


        $hot_product = DB::table('tbl_product')
            ->where([['product_hot','1'],['product_status','0']])
            ->paginate(8);

            //cÂY TRANG TRÍ TRONG NHÀ
        $hot_product_big2 = DB::table('tbl_category_product')
            ->where([['category_id','1'],['category_status','0']])
            ->orderby(DB::raw('RAND()'))
            ->limit(1)
            ->get();

        $hot_product2 = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where([['tbl_product.category_id','1'],['product_status','0']])
            ->orderby(DB::raw('RAND()'))
            ->paginate(8);
        $blog = DB::table('tbl_posts')
            ->where([['post_status','0']])
            ->orderby('id','desc')
            ->paginate(4);
    	return view('pages.home')
            ->with('category',$cate_product)
            ->with('hot_product',$hot_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('category_title',$category_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('hot_product_big',$hot_product_big)
            ->with('hot_product_big2',$hot_product_big2)
            ->with('blog',$blog)

            ->with('hot_product2',$hot_product2);
    }
    public function introduce(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        $introduce = DB::table('tbl_introduces')
                    ->where([['introduce_status','0']])
                    ->orderby('id','desc')
                    ->limit(1)
                    ->get();
        return view('pages.introduce')
            ->with('slider',$slider)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('hot_news',$hot_news)
            ->with('introduce',$introduce)
            ->with('category',$cate_product);
    }
    public function product(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('product_status','0')
            ->orderby('tbl_product.product_id','desc')
            ->simplePaginate(16);
//        dd($all_product);
        $arr_hot = [];

        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        foreach ($hot_news as $hot){
            array_push($arr_hot,$hot->id);
        }
        return view('pages.product.all_product')
            ->with('slider',$slider)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('category',$cate_product)
            ->with('hot_news',$hot_news)
            ->with('all_product',$all_product);
    }
    public function blog(Request $request ){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        $arr_hot = [];

        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        foreach ($hot_news as $hot){
            array_push($arr_hot,$hot->id);
        }
        $all_blog = DB::table('tbl_posts')
            ->where('post_status','0')
            ->whereNotIn('id', $arr_hot)
            ->orderby('id','desc')
            ->paginate(5);
        return view('pages.blog.all_blog')
            ->with('slider',$slider)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('all_blog',$all_blog)
            ->with('hot_news',$hot_news)
            ->with('category',$cate_product);

    }
    public function search(Request $request){
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.product.search')
            ->with('category',$cate_product)
            ->with('hot_news',$hot_news)
            ->with('search_product',$search_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);

    }

    public function post_detail(Request $request,$slug){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();


        $details_post = DB::table('tbl_posts')
                        ->where('tbl_posts.slug',$slug)
                        ->get();
        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        return view('pages.blog.blog_details',[
            'slider'=>$slider,
            'category'=>$cate_product,
            'meta_desc'=>$meta_desc,
            'meta_keywords'=>$meta_keywords,
            'meta_title'=>$meta_title,
            'url_canonical'=>$url_canonical,
            'details_post'=>$details_post,
            'hot_news'=>$hot_news


        ]);
    }
    public function contact(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những cây cảnh lâu năm";
        $meta_keywords = "thiết bị cây cảnh,phụ kiện cắt tỉa,đồ dùng nông nghiệp";
        $meta_title = "Phụ kiện,thiết bị cho cây cảnh chính hãng";
        $url_canonical = $request->url();
        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        return view('pages.contact')
            ->with('slider',$slider)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('hot_news',$hot_news)

            ->with('category',$cate_product);
    }

}
