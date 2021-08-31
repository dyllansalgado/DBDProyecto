<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Username',64)->unique();
            $table->string('Pass',64);
            $table->integer('Edad');
            //Nose si hay tipo correo no se encontró.
            $table->string('CorreoElectronico',128);
            $table->date('FechaNacimiento');

            //Foraneas
            $table->unsignedBigInteger('ID_Comuna')->nullable();
            $table->foreign('ID_Comuna')->references('id')->on('communes');
            //$table->foreign('ID_Comuna')->references('id')->on('communes')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
