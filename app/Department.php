<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable=[
        'Name_En','Name_Ku','Name_Ar', 'faculty_id'
    ];
    protected $table='departments';

    public function users()
    {
        return $this->hasMany("App\User");
    }
    
    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
    

}
