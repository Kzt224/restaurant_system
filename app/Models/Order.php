<?php

namespace App\Models;


use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function Dishes()
    {
       return $this->belongsTo('App\Models\Dishes','dish_id');
    }
    public function tables()
    {
        return $this->belongsTo('App\Models\Table','table_id');
    }    
}
