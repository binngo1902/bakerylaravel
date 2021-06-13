<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $table = 'products';
    public function type_products(){
        return $this->belongsTo('App\type_products','id_type','id');
    }
    public function bills_products(){
        return $this->hasMany('App\bills_products','id_product','id');
    }
}
