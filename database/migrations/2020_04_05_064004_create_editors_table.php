<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('apepat', 50);
            $table->string('apemat', 50);
            $table->date('fecnac');
            $table->string('correo', 100)->unique();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('editors');
    }
}
