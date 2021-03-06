<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    //
    protected $table = 'bills';
    public function bills_products(){
        return $this->hasMany('App\bills_products','id_bill','id');
    }
    public function customer(){
        return $this->belongsTo('App\customer','id_customer','id');
    }
}
