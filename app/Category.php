<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Category extends Model
{

    protected $fillable = ['Name_En', 'Name_Ku', 'Name_Ar', 'user_id'];
   protected $table='categories';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

    public function item()
    {
        return $this->hasMany('App\Item');
    }


}
