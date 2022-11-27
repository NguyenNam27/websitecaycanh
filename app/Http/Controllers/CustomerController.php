<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customers')
            ->orderby('tbl_customers.customer_id','desc')->paginate(5);
        return view('admin.all_customer')
                    ->with('all_customer',$all_customer);

    }
    public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('/all-customer');
    }
}
