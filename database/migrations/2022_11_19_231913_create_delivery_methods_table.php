<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2022_10_17_195526_create_services_table.php
            $table->string('phone');
            $table->string('notes');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
=======
            $table->string('name')->nullable();
>>>>>>> 42037d747d01c6bdc7a0637d3e12639b65ae8e23:database/migrations/2022_11_19_231913_create_delivery_methods_table.php
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
        Schema::dropIfExists('delivery_methods');
    }
}
