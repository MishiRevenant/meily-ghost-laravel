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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id();
            
            // Esta es la relación clave:
            // Conecta la tienda con el usuario que es dueño
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Si borras el usuario, se borra su tienda
            
            $table->string('nombre_tienda');
            $table->string('logo_path')->nullable(); // Guardará la ruta al logo
            
            // Campo 'slug' para URLs amigables (ej: /tienda/mi-tienda-linda)
            $table->string('slug')->unique(); 

            $table->string('color_primario')->default('#FFFFFF');
            $table->string('color_secundario')->default('#000000');
            $table->text('descripcion_corta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendas');
    }
};