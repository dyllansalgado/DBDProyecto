<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlistvideos', function (Blueprint $table) {
            $table->id();

            //foraneas
            $table->unsignedBigInteger('ID_Video')->nullable();
            $table->foreign('ID_Video')->references('id')->on('videos');
            //$table->foreign('ID_Video')->references('id')->on('videos')->onDelete('cascade');

            $table->unsignedBigInteger('ID_Playlist')->nullable();
            $table->foreign('ID_Playlist')->references('id')->on('playlists');
            //$table->foreign('ID_Playlist')->references('id')->on('playlists')->onDelete('cascade');
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
        Schema::dropIfExists('playlistvideos');
    }
}
