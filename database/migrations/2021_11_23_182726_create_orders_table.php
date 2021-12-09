<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('name');
            $table->string('address')->nullable();
            $table->string('references')->nullable();
            $table->integer('cp')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('colonia')->nullable();
            $table->string('telefono')->nullable();

            $table->enum('status_shipped', [Order::PENDIENTE, Order::CAMINO,  Order::ENTREGADO, Order::NO_ENTREGADO])->default(Order::PENDIENTE);
            $table->enum('status_paid', [ Order::PROCESANDO, Order::CANCELADO, Order::PAGADO, Order::POR_COBRAR])->default(Order::PROCESANDO);

            $table->enum('envio_type', [1, 2]);
            $table->float('shipping_cost');

            $table->float('total');
            $table->float('Acuenta')->nullable();
            $table->json('content');
            $table->json('entregado')->nullable();

            // $table->unsignedBigInteger('city_id');
            // $table->foreign('city_id')->references('id')->on('cities');

            // $table->unsignedBigInteger('department_id');
            // $table->foreign('department_id')->references('id')->on('departments');

            // $table->unsignedBigInteger('disctrict_id');
            // $table->foreign('disctrict_id')->references('id')->on('disctricts');

            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
