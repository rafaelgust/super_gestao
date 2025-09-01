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
        Schema::create('site_cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->nullable();
            $table->text('descricao')->nullable();
            $table->string('descricao_area', 150)->nullable();
            $table->text('descricao_html')->nullable();
            $table->string('telefone_contato', 20)->nullable();
            $table->string('whatsapp_contato', 20)->nullable();
            $table->string('email_contato', 150)->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_cliente');
    }
};
