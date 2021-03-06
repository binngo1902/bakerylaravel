<?php

namespace App\Http\Controllers;

use App\bills;
use App\bills_products;
use App\products;
use App\slides;
use App\type_products;
use App\customer;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function trangchu(){
        $slides = slides::all();
        $newProducts = products::where('new',1)->paginate(4);
        $saleProducts = products::where('promotion_price','<>',0)->get();
        return view('pages.trangchu',['slides'=>$slides,'newProducts'=>$newProducts,'saleProducts'=>$saleProducts]);
    }
    public function paginate(Request $request){
        if($request->ajax() || 'Null' )
        {
            $newProducts = products::where('new',1)->paginate(4);
            return view('pages.pagination_newproduct',['newProducts'=>$newProducts]);
        }
    }

    public function typeProduct($id){
        $type = type_products::find($id);
        $typename = type_products::where('id',$id)->first();
        return view('pages.typeproduct',['type1'=>$type,'typename'=>$typename]);
    }

    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function product($id){
        $billproduct = DB::table('bills_products')
        ->select(DB::raw('sum(quantity) as product_count,id_product'))
        ->groupBy('id_product')->orderByDesc('product_count')->take(5)
        ->pluck('id_product');

        $bestsellers = products::whereIn('id',$billproduct )->get();
        // dd($bestsellers);
        $product = products::find($id);
        $likeproducts = products::where('id_type',$product->id_type)->paginate(3);
        return view('pages.product',['product'=>$product,'likeproducts'=>$likeproducts,'bestsellers'=>$bestsellers]);
    }

    public function paginationlikeproduct(Request $request,$idtype){
        if($request->ajax()){
            $likeproducts = products::where('id_type',$idtype)->paginate(3);
            return view('pages.pagination_likeproduct',compact('likeproducts'));

        }
    }


    public function checkout(){
        return view('pages.checkout');
    }

    public function postCheckout(Request $request){
        $cart = Session::get('Cartshopping');
        // dd($cart);
        $this->validate($request,[
            'ten' => 'required',
            'email'=> 'required|email',
            'address' => 'required|min:10',
            'phone' => 'required|min:10|max:10',

        ],[
            'ten.required' => 'B???n ch??a nh???p h??? t??n',
            'email.required' => 'B???n ch??a nh???p email',
            'address.required' => 'B???n ch??a nh???p ?????a ch???',
            'address.min' => '?????a ch??? ph???i ghi r?? ???????ng, ph?????ng , qu???n, th??nh ph???',
            'phone.required' => 'B???n ch??a nh???p s??? ??i???n tho???i',
            'phone.min' => 'S??? ??i???n tho???i ph???i ????? 10 s???',
            'phone.max' => 'S??? ??i???n tho???i ph???i ????? 10 s???',
        ]);

        $customer = new Customer();
        $customer->name = $request->ten;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone;
        $customer->notes = $request->notes;
        $customer->address = $request->address;
        $customer->created_at = new DateTime();
        $customer->save();

        $bill = new bills();
        $bill->id_customer = $customer->id;
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->notes;
        $bill->created_at = new DateTime();
        $bill->save();

        foreach($cart->products as $key => $value){
            $details = new bills_products();
            $details->id_bill = $bill->id;
            $details->id_product = $key;
            $details->quantity = $value['quantity'];
            $details->unit_price = $value['price'] / $value['quantity'];
            $details->created_at = new DateTime();
            $details->save();
        }
        $data = $request->ten;
        Mail::to($request->email)->send(new SendMail($data));
        Session::forget('Cartshopping');
        return redirect()->route('checkout')->with('thongbao','B???n ???? ?????t h??ng th??nh c??ng');
    }


    public function error(){
        return view('pages.error');
    }

    public function getsearch(Request $request){
        $name = $request->search;
        $products = products::where('name','like','%'.$request->search.'%')->orWhere('unit_price',$request->search)->get();
        return view('pages.search',compact('products','name'));
    }


}
