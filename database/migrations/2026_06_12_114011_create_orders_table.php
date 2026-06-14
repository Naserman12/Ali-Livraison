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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('courier_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->foreignId('service_type_id')
            ->constrained('service_types')
            ->cascadeOnDelete();

            $table->enum('status',[
                'pending',
                'accepted',
                'courier_arrived',
                'picked_up',
                'on_the_way',
                'arrived_destination',
                'delivered',
                'cancelled'
            ])->default('pending');

            $table->string('pickup_address');

            $table->decimal('pickup_lat',10,7)->nullable();
            $table->decimal('pickup_lng',10,7)->nullable();

            $table->string('dropoff_address')->nullable();

            $table->decimal('dropoff_lat',10,7)->nullable();
            $table->decimal('dropoff_lng',10,7)->nullable();

            $table->decimal('distance',8,2)->nullable();

            $table->decimal('price',10,2);

            $table->text('notes')->nullable();

            $table->string('pickup_qr')->nullable();

            $table->string('delivery_qr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
