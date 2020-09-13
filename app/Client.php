<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable= ['id','name','phone','address'];
    protected $hidden = ['created_at','updated_at'];

    public function orders(){
        return $this->hasMany('App\Order','client_id');
    }
}
