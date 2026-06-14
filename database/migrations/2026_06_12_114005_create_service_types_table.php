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
    Schema::create('service_types', function (Blueprint $table) {

    $table->id();

    $table->string('name_ar');
    $table->string('name_fr');
    // $table->string('name_en');
    $table->decimal('base_price',10,2);

    $table->decimal('price_per_km',10,2);

    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_types');
    }
};
