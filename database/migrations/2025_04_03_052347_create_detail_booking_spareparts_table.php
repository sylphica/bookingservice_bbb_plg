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
        Schema::create('detail_booking_spareparts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_booking_id');
            $table->unsignedBigInteger('sparepart_id');
            $table->integer('quantity')->default(1);
            $table->integer('total_price')->default(0);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('detail_booking_id')->references('id')->on('detail_booking')->onDelete('cascade');
            $table->foreign('sparepart_id')->references('id_sparepart')->on('spareparts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_booking_spareparts');
    }
};
