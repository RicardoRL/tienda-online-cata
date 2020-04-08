<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->string('codigo_postal', 10);
            $table->string('estado', 30);
            $table->string('ciudad', 100);
            $table->string('colonia', 100);
            $table->string('calle_principal', 100);
            $table->integer('num_ext')->nullable();
            $table->integer('num_int')->nullable();
            $table->string('calle1', 100);
            $table->string('calle2', 100);
            $table->string('referencia')->nullable();
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
        Schema::dropIfExists('domicilios');
    }
}
