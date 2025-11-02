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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 255);
        $table->text('descripcion')->nullable();
        $table->string('imagen_url', 255);
        $table->decimal('precio', 10, 2);
        $table->foreignId('categoria_id')->nullable()->constrained('categorias');
        $table->foreignId('estilo_id')->nullable()->constrained('estilos');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
