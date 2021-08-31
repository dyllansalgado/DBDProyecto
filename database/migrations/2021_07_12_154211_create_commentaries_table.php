<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->id();
            $table->string('Autor',64);
            $table->string('Contenido',240);

            //foraneas
            $table->unsignedBigInteger('ID_Video')->nullable();
            $table->foreign('ID_Video')->references('id')->on('videos');
            //$table->foreign('ID_Video')->references('id')->on('videos')->onDelete('cascade');

            $table->unsignedBigInteger('ID_Usuario')->nullable();
            $table->foreign('ID_Usuario')->references('id')->on('users');
            //$table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('commentaries');
    }
}
