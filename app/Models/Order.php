<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'updated_at', 'create_at', 'status_shipped', 'status_paid'];
    const PENDIENTE = 1;
    const CAMINO = 2;
    const ENTREGADO = 3;
    const NO_ENTREGADO= 4;

    
    const PROCESANDO= 5;
    const CANCELADO = 6;
    const PAGADO = 7;
    const POR_COBRAR = 8;


    // public function deparment() {
    //     return $this->belongsTo(Department::class);
    // }
    // public function city() {
    //     return $this->belongsTo(City::class);
    // }
    // public function disctrict() {
    //     return $this->belongsTo(Disctrict::class);
    // }

    public function user(){
        return $this-> belongsTo(User::class);
    }
   
}
