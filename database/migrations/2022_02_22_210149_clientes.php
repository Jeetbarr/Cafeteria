<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente');
            $table->string('rutCliente');
            $table->string('cantpedidoCliente');
            $table->foreignId('id_servicios')
                  ->nullable()
                  ->constrained('servicios')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->rememberToken();
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
        //
        Schema::dropIfExists('Clientes');
    }
}
