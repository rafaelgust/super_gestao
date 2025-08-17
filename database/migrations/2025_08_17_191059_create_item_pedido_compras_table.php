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
        Schema::create('item_pedido_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_compra_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->float('preco_unitario', 10, 2);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('pedido_compra_id')->references('id')->on('pedido_compras');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('item_pedido_compras');
        Schema::enableForeignKeyConstraints();
    }
};
