<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    public $primaryKey ='type_id';
    public $fillable = [
      'type_prefix',
      'type_name',
      'type_category'
    ];
}
