<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideocategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videocategories', function (Blueprint $table) {
            $table->id();

            //Foraneas 
            $table->unsignedBigInteger('ID_Video')->nullable();
            //Se ingresa onDelete para borrar la categoria sin afectar a los videos.
            $table->foreign('ID_Video')->references('id')->on('videos');
            //$table->foreign('ID_Video')->references('id')->on('videos')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Categoria')->nullable();
            $table->foreign('ID_Categoria')->references('id')->on('categories');
            //Se ingresa onDelete para borrar la categoria sin afectar a los a los videoscategoria.
            //$table->foreign('ID_Categoria')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('videocategories');
    }
}
