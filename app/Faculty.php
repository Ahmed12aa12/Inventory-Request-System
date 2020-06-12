<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table='faculties';
    protected $primarykey='id';
  protected $fillable=['Name_En',
  'Name_Ar',
  'Name_Ku'];

  public function departments()
{
  return $this->hasMany("App\Department" );
}



}
