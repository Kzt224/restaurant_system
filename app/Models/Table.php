<?php

namespace App\Models;


use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
   public function orders()
   {
    return $this->hasMany('App\Models\Order','table_id');
   }

}
