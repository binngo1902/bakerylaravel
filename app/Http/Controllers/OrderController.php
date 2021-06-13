<?php

namespace App\Http\Controllers;

use App\bills;
use App\bills_products;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function getList(){

        $lists = DB::table('customer')->join('bills','customer.id','=','bills.id_customer')
                                      ->orderBy('created_at','desc')
                                    ->get(['customer.id','customer.name','customer.gender','customer.email','customer.address',
                                'customer.phone_number','customer.notes','customer.created_at','bills.total','bills.payment','bills.id as bills_id']);
        // dd($lists);
                                return view('admin.order.list',compact('lists'));
    }

    public function getDelete($id){
        $list = customer::find($id);
        $list->delete();
        return redirect()->back()->with('msg','bạn đã xóa đơn hàng thành công.');
    }

    public function getBill($id){
        $bill = bills::find($id);
        $billdetails = bills_products::where('id_bill',$id)->get();
        return view('admin.order.details',compact('billdetails','bill'));
    }
}
