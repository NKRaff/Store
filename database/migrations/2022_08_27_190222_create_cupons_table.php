<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('localizador')->unique();
            $table->decimal('desconto', 6, 2)->default(0);
            $table->enum('modo_desconto', ['valor', 'porc'])->default('porc');
            $table->decimal('limite', 6, 2)->default(0);
            $table->enum('modo_limite', ['valor', 'qtd'])->default('qtd');
            $table->string('validade');
            $table->enum('ativo', ['S', 'N'])->default('S');
            $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
