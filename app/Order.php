<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['id' ,'user_id','totalPrice','statues'];
    protected $hidden = ['created_at','updated_at'];


    public function clients(){
        return $this->belongsTo('App\Client','client_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product','order_product','order_id','product_id')->withPivot('quantity');;
    }

}
