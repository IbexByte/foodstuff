<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('place_of_arrival');
            $table->string('place_of_delivery');
            $table->date('delivery_date');
            $table->timestamps();
            $table->unsignedBigInteger('shipment_type_id');
            $table->unsignedBigInteger('shipment_status_id');
            $table->foreign('shipment_type_id')->references('id')->on('shipment_types')->onDelete('cascade');
            $table->foreign('shipment_status_id')->references('id')->on('shipment_statuses')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
