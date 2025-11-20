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
            $table->bigInteger('amount');
            $table->string('order_number');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('delivery_method_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->enum('status', [
                'awaiting_payment',// ایجاد شده ولی پرداخت نشده
                'paid',            // پرداخت شده
                'processing',      // در حال پردازش (هر فروشنده جدا)
                'completed',       // تکمیل شده
                'cancelled',       // لغو شده
            ])->default('awaiting_payment');
            $table->softDeletes();

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
