<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCervezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cervezas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cerveceria_id')->nullable();
            $table->string('nombre', 50);
            $table->string('estilo', 50);
            $table->string('aspecto');
            $table->text('sabor_aroma');
            $table->string('alcohol', 10);
            $table->text('temp_consumo');
            $table->text('maridaje');
            $table->string('presentacion');
            $table->decimal('precio', 11, 2);
            $table->integer('cantidad')->unsigned();
            $table->string('imagen')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cervezas');
    }
}
