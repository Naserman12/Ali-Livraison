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
      Schema::create('order_locations', function (Blueprint $table) {

    $table->id();

    // الطلب المرتبط بالموقع
    $table->foreignId('order_id')
        ->constrained()
        ->cascadeOnDelete();

    // المندوب الذي يرسل الموقع
    $table->foreignId('courier_id')
        ->constrained('users')
        ->cascadeOnDelete();

    // الإحداثيات
    $table->decimal('latitude', 10, 7);
    $table->decimal('longitude', 10, 7);

    // السرعة (اختياري لكن مهم للتتبع الاحترافي)
    $table->decimal('speed', 8, 2)->nullable();

    // الدقة (Accuracy من GPS)
    $table->decimal('accuracy', 8, 2)->nullable();

    // اتجاه الحركة (Bearing)
    $table->decimal('heading', 8, 2)->nullable();

    // الوقت الحقيقي للـ GPS
    $table->timestamp('recorded_at')->useCurrent();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_locations');
    }
};
