<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contato_motivos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo', 100);
            $table->timestamps();
        });

        DB::table('contato_motivos')->insert(
            [
                ['motivo' => 'Não especificado'],
                ['motivo' => 'Dúvida'],
                ['motivo' => 'Sugestão'],
                ['motivo' => 'Reclamação'],
                ['motivo' => 'Elogio'],
            ]
        );

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_id')->after('mensagem')->default(0);
            $table->foreign('motivo_id')->references('id')->on('contato_motivos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Remover FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign(['motivo_id']);
            $table->dropColumn('motivo_id');
        });
        Schema::dropIfExists('contato_motivos');
    }
};
