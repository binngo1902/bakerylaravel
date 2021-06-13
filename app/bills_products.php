<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills_products extends Model
{
    //
    protected $table = 'bills_products';

    public function products(){
        return $this->belongsTo('App\products','id_product','id');
    }
    public function bills(){
        return $this->belongsTo('App\bills','id_bill','id');
    }
}
