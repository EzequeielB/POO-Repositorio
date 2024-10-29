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
        Schema::create('equipos_de_trabajos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("vehiculo_id");
            $table->foreign("vehiculo_id")
                ->references("id")
                ->on("vehiculos");
            $table->unsignedBigInteger("equipo_id");
            $table->foreign("equipo_id")
                ->references("id")
                ->on("equipos");
            $table->unsignedBigInteger("tecnico_id");
            $table->foreign("tecnico_id")
                ->references("id")
                ->on("tecnicos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos_de_trabajos');
    }
};
