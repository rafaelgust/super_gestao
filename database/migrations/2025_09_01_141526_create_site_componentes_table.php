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
        Schema::create('site_componentes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100)->index();
            $table->string('titulo')->nullable();
            $table->text('valor')->nullable();
            $table->text('descricao')->nullable();
            $table->text('descricao_html')->nullable();
            $table->string('icone')->nullable();
            $table->string('cor', 7)->nullable(); // hex color format
            $table->string('url')->nullable();
            $table->unsignedBigInteger('id_referencia')->nullable()->index();
            $table->integer('ordem')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_referencia')->references('id')->on('site_componentes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_componentes', function (Blueprint $table) {
            $table->dropForeign(['id_referencia']);
        });
        Schema::dropIfExists('site_componentes');
    }
};
