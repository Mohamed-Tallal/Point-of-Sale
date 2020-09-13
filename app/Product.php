<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['id' ,'name','description','mainPrice','salesPrice','image','category_id','store'];
    protected $hidden = ['created_at','updated_at'];



    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function orders(){
        return $this->belongsToMany('App\Order','order_product','order_id','product_id')->withPivot('quantity');
    }

}
