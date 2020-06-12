<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id', 'status', 'product_id', 'description'];
    public function user()
    {
        return $this->belongsTo('App\User');

    }
    
    
    public function statues()
    {
        return $this->hasOne('App\Status');
    }
    public function item()
    {

        return $this->belongsToMany('App\Item', 'order_item', 'order_id', 'item_id')->withPivot(['quantity']);
    }
 
    



    
}
