<?php

use App\Models\CartItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(CartItem::MIN_QUANTITY);
            $table->text('notes')->nullable();
            $table->foreignId('cart_id');
            $table->foreignId('product_id');

            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unique([ 'cart_id', 'product_id' ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
