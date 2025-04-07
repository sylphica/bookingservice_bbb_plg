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
        Schema::create('detail_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade');
            $table->string('ask_service')->nullable();
            $table->string('konfirmasi_sparepart')->nullable();
            $table->string('ask_10km')->nullable();
            $table->double('biaya_10km', 15, 8)->nullable();
            $table->string('ask_extra')->nullable();
            $table->double('biaya_extra', 15, 8)->nullable();
            $table->text('foto')->nullable();
            $table->text('pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_booking');
    }
};
