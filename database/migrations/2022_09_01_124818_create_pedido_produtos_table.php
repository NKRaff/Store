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
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->integer('produto_id')->unsigned();  // unsigned: somente inteiros positivos
            $table->enum('status', ['RE', 'PA', 'CA']); // Reservado, Pago, Cancelado
            $table->decimal('valor', 6, 2)->default(0);
            $table->decimal('desconto', 6, 2)->default(0);
            $table->integer('cupom_desconto_id')->nullable()->unsigned(); // unsigned: somente inteiros positivos
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('products');
            $table->foreign('cupom_desconto_id')->references('id')->on('cupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
};
