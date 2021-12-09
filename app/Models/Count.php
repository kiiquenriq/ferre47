<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'updated_at', 'create_at', 'status_shipped', 'status_paid'];


    public function order(){
        return $this-> belongsTo(Order::class);
    }
   
}
