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
        Schema::create('pedido_vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('nota_fiscal');
            $table->float('valor_total', 10, 2);
            $table->string('status');
            $table->date('data_pedido');
            $table->date('data_entrega');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pedido_vendas');
        Schema::enableForeignKeyConstraints();
    }
};
