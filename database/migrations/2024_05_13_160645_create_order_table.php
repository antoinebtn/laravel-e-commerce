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
            $table->string('firstname');
            $table->string('surname');
            $table->string('company')->nullable();
            $table->text('address');
            $table->string('postal');
            $table->string('city');
            $table->string('card_number');
            $table->string('card_expiration_date');
            $table->string('cryptogramme');
            $table->string('card_name');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('order_id');
            $table->unsignedBiginteger('product_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
