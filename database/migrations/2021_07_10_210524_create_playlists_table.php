<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',64);
            $table->string('Descripcion',240);

            //Foraneas
            $table->unsignedBigInteger('ID_Serie')->nullable();
            $table->foreign('ID_Serie')->references('id')->on('series');
            //$table->foreign('ID_Serie')->references('id')->on('series')->onDelete('cascade');
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
        Schema::dropIfExists('playlists');
    }
}
