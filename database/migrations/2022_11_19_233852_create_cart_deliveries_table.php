<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('cart_group_id')->nullable();
            $table->foreignId('delivery_method_id')
            ->nullable()
            ->references('id')
            ->on('delivery_methods')
            ->onDelete('cascade');
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
        Schema::dropIfExists('cart_deliveries');
    }
}
