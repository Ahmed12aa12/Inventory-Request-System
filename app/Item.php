<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    //
    protected $fillable=['Name_En', 'Name_Ku', 'Name_Ar','user_id','cat_id'];
    protected $table="items";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id','id');
    }
    public function order()
    {

            return $this->belongsToMany('App\Order', 'order_item', 'item_id', 'order_id')->withPivot('quantity');
   
    }
    

}
