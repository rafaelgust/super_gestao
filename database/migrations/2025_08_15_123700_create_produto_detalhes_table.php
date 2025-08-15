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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id')->unique();
            $table->float('peso', 8,2);
            $table->float('altura', 8,2);
            $table->float('largura', 8,2);
            $table->float('comprimento', 8,2);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
        });

        Schema::dropIfExists('produto_detalhes');
    }
};
