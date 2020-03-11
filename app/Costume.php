<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
  public $timestamps = false;
  public $primaryKey ='costume_id';
  public $incrementing = false;
  public $fillable = [
    'costume_name',
    'costume_category',
    'costume_status',
    'costume_prefix',
    'costume_borowee',
    'costume_deadline'
  ];
}
