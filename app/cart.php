<?php
    namespace App;

    class cart{
        public $products = null;
        public $totalPrice = 0;
        public $totalQuantity = 0;

        public function __construct($cart)
        {
            if ($cart){
                $this->products = $cart->products;
                $this->totalPrice = $cart->totalPrice;
                $this->totalQuantity = $cart->totalQuantity;
            }

        }

        public function addCart($product,$id,$quantity){

            $newproduct = ['quantity' => 0,'price' => 0 , 'productInfo' =>$product];
            if($this->products){
                if(array_key_exists($id,$this->products)){
                    $newproduct = $this->products[$id];
                }
            }
            $newproduct['price'] += (($product->promotion_price!=0) ? $product->promotion_price : $product->unit_price) *$quantity;
            $newproduct['quantity'] += $quantity;

            // $this->products[$id]['price'] = $newproduct['price']*$newproduct['quantity'];
            $this->products[$id] = $newproduct;
            $this->totalPrice += (($product->promotion_price!=0) ? $product->promotion_price : $product->unit_price) *$quantity;
            $this->totalQuantity += $quantity;
        }

        public function deleteCart($id){
            $this->totalQuantity -= $this->products[$id]['quantity'];
            $this->totalPrice -= $this->products[$id]['price'];
            unset($this->products[$id]);
        }

        public function updateCart($id,$quantity){

            $this->totalQuantity -= $this->products[$id]['quantity'];
            $this->totalPrice -= $this->products[$id]['price'];


            $this->products[$id]['quantity'] = $quantity;
            $this->products[$id]['price'] = (($this->products[$id]['productInfo']->promotion_price!=0) ?
                                        $this->products[$id]['productInfo']->promotion_price :
                                        $this->products[$id]['productInfo']->unit_price)*$quantity;

            $this->totalQuantity += $this->products[$id]['quantity'];
            $this->totalPrice += $this->products[$id]['price'];
        }
    }





?>
