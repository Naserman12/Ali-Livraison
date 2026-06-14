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
       Schema::create('order_verifications', function (Blueprint $table) {

    $table->id();

    $table->foreignId('order_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('pickup_code');

    $table->string('delivery_code');

    $table->timestamp('pickup_verified_at')
        ->nullable();

    $table->timestamp('delivery_verified_at')
        ->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_verifications');
    }
};
