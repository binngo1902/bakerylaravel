<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use App\cart;
use Illuminate\Support\Facades\Session;
// use Session;


class CartController extends Controller
{
    //
    public function shoppingCart(){
        return view('pages.shoppingcart');
    }

    // public function addCart(Request $request){
    //     $product_id = $request->idproduct;
    //     $quantity = $request->quantity;

    //     $data = products::where('id',$product_id)->get();
    //     return redirect()->route('shoppingcart')->with('data',$data)->with('quantity',$quantity);
    // }
    public function addCart(Request $request){
        $product = products::where('id',$request->idproduct)->first();
        if ($product != Null){
            $oldcart = Session::has('Cartshopping') ? Session::get('Cartshopping') : null;
            $newcart = new cart($oldcart);
            $newcart->addCart($product,$request->idproduct,$request->quantity);
            Session::put('Cartshopping',$newcart);
            // dd(Session::all());

        }
        return view('pages.shoppingcart');
        }

    public function deleteCart($id){
        $oldcart = Session::has('Cartshopping') ? Session::get('Cartshopping') : null;
        $newcart = new cart($oldcart);
        $newcart->deleteCart($id);
        if (count($newcart->products)>0){
            Session::put('Cartshopping',$newcart);
        }
        else{
            Session::forget('Cartshopping');
        }
        return view('layout.cart_header');

    }

    public function cartHeader(){
        return view('layout.cart_header');
    }
    public function getaddcart(){
        return view('pages.shoppingcart');
    }
    public function deleteItemListCart($id){
        $oldcart = Session::has('Cartshopping') ? Session::get('Cartshopping') : null;
        $newcart = new cart($oldcart);
        $newcart->deleteCart($id);
        if (count($newcart->products)>0){
            Session::put('Cartshopping',$newcart);
        }
        else{
            Session::forget('Cartshopping');
        }
        return view('pages.cart');

    }

    public function editItemListCart($id,$quantity){

        $oldcart = Session::has('Cartshopping') ? Session::get('Cartshopping') : null;
        $newcart = new cart($oldcart);
        $newcart->updateCart($id,$quantity);

        Session::put('Cartshopping',$newcart);

        return view('pages.cart');

    }



}
