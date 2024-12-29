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
            $table->id(); //tiene identity automatico
            $table->string('nombre'); //nombre del producto
            $table->text('descripcion')->nullable(); // desc de producto puede ser nulo
            $table->decimal('precio', 8,2);
            $table->integer('cantidad');
            //relacion con la tabla de usuarios
            //declaramos foreign key
            $table->foreignId('user_id') //nomenclatura de laravel 
                ->constrained('users') //nuestra tabla users 
                ->onDelete('cascade'); //para eliminar en cascada por la integirdad referencial
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
