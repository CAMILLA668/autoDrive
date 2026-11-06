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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('marca_id')
              ->cascade()
              ->onDelete('constrained');

            $table->string('modelo');
            $table->integer('ano');
            $table->decimal('preco', 10,2);
            $table->enum('status', [
                'disponivel',
                'reservado',
                'vendido',
            ])->default('disponivel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
