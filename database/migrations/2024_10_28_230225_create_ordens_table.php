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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");

        $table->unsignedBigInteger("equipo_id");
        $table->foreign("equipo_id")
            ->references("id")
            ->on("equipos");

        $table->unsignedBigInteger("cliente_id");
        $table->foreign("cliente_id")
            ->references("id")
            ->on("clientes");

            $table->unsignedBigInteger("estado_id");
            $table->foreign("estado_id")
                ->references("id")
                ->on("estados");

            $table->unsignedBigInteger("tipo_id");
            $table->foreign("tipo_id")
                ->references("id")
                ->on("tipos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};