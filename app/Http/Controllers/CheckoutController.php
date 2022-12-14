<?php


namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;
use Validate;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use App\Slider;
use App\Shipping;
use App\Order;
use App\OrderDetails;

class CheckoutController extends Controller
{

    public function confirm_order(Request $request){
         $data = $request->all();
         $shipping = new Shipping();
         $shipping->shipping_name = $data['shipping_name'];
         $shipping->shipping_email = $data['shipping_email'];
         $shipping->shipping_phone = $data['shipping_phone'];
         $shipping->shipping_address = $data['shipping_address'];
         $shipping->shipping_notes = $data['shipping_notes'];
         $shipping->shipping_method = $data['shipping_method'];
         $shipping->save();
        $shipping_id = $shipping->shipping_id;

         $checkout_code = substr(md5(microtime()),rand(0,26),5);


         $order = new Order;
         $order->customer_id = Session::get('customer_id');
         $order->shipping_id = $shipping_id;
         $order->order_status = 1;
         $order->order_code = $checkout_code;

         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $order->created_at = now();
         $order->save();

         if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon =  $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
         }
         Session::forget('coupon');
         Session::forget('fee');
         Session::forget('cart');
    }
    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }

     public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function calculate_fee(Request $request){
        $data = $request->all();

        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',25000);
                    Session::save();
                }
            }

        }
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Ch???n qu???n huy???n---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Ch???n x?? ph?????ng---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();

        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);

    }
    public function register_checkout(Request $request){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //seo
        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.checkout.register_checkout')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);
    }
    public function login_checkout(Request $request){


        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
//
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
//
    	return view('pages.checkout.login_checkout')
            ->with('category',$cate_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);
    }
    public function add_customer(Request $request){
        $rule = [
            'customer_name'=>'required|min:5',
            'customer_email'=>'required|email|unique:tbl_customers',
            'customer_password'=>'required|min:8',
            'customer_phone'=>'required',

        ];
        $massage = [
            'customer_name.required'=>'t??n b???t bu???c nh???p',
            'customer_name.min'=>'t??n kh??ng ???????c nho h??n:min',
            'customer_email.required'=>'email b???t bu???c ph???i nh???p',
            'customer_email.email'=>'email kh??ng ????ng ?????nh d???ng',
            'customer_email.unique'=>'email ???? t???n t???i',
            'customer_password.required'=>'m???t kh???u b???t bu???c ph???i nh???p',
            'customer_password.min'=>'m???t kh???u kh??ng ??c nh??? h??n :min',
            'customer_phone.required'=>'S??? ??i???n tho???i b???t bu???c nh???p',

        ];

        $request->validate($rule,$massage);

    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);
        Session()->flash('success','????ng k?? th??nh C??ng');
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        Session::put('customer_email',$request->customer_email);
        Session::put('customer_phone',$request->customer_phone);
        return Redirect::to('/checkout');


    }
    public function checkout(Request $request){
         //seo
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $meta_desc = "????ng nh???p thanh to??n";
        $meta_keywords = "????ng nh???p thanh to??n";
        $meta_title = "????ng nh???p thanh to??n";
        $url_canonical = $request->url();
        //--seo

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $city = City::orderby('matp','ASC')->get();
        $hot_news = DB::table('tbl_posts')
            ->where([['hot_news','1'],['post_status','0']])
            ->orderby('id','desc')
            ->get();
    	return view('pages.checkout.show_checkout')
            ->with('category',$cate_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('city',$city)
            ->with('hot_news',$hot_news)

            ->with('slider',$slider);
    }
    public function save_checkout_customer(Request $request){
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_notes'] = $request->shipping_notes;
    	$data['shipping_address'] = $request->shipping_address;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);

    	return Redirect::to('/payment');
    }


    public function logout_checkout(){
    	Session::forget('customer_id');
    	return Redirect::to('/dang-nhap');
    }
    public function login_customer(Request $request){
        $rule = [
            'email_account' => 'required|email',
            'password_account' => 'required|',
        ];

        $massage = [
            'email_account.required'=>'B???n ch??a nh???p email',
            'email_account.email'=>'Email ch??a ????ng ?????nh d???ng',
            'password_account.required'=>'B???n ch??a nh???p m???t kh???u',
        ];

        $request->validate($rule,$massage);

    	$email = $request->email_account;
    	$password = md5($request->password_account);

        $result = DB::table('tbl_customers')
            ->where([['customer_email',$email],['customer_password',$password]])
            ->first();
        
    	if($result){
    		Session::put('customer_id',$result->customer_id);
            Session()->flash('success','????ng nh???p th??nh C??ng');
    		return Redirect::to('/checkout');
    	}else{
            Session()->flash('error','????ng nh???p th???t b???i');
    		return Redirect::to('/dang-nhap');
    	}
        Session::save();

    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
}
