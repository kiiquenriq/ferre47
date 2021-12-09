<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable =['name', 'cost', 'department_id'];
    public function disctricts() {
        return $this->hasMany(Disctrict::class);
    }

        
    // public function orders() {
    //     return $this->hasMany(Order::class);
    // }
}
