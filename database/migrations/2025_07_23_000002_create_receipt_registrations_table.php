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
        Schema::create('receipt_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name', 100);
            $table->string('email', 100);
            $table->string('phone', 30);
            $table->string('receipt_number', 100);
            $table->date('purchase_date');
            $table->string('receipt_image_path')->nullable(); // ścieżka do obrazu
            $table->text('contest_answer');
            $table->boolean('consent_regulations');
            $table->boolean('consent_rodo');
            $table->boolean('consent_external');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_registrations');
    }
};
