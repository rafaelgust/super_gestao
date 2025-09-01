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
        Schema::create('produto_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onNull();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onNull();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_categorias', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
            $table->dropForeign(['categoria_id']);
        });
        Schema::dropIfExists('produto_categorias');
    }
};
