<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserplaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userplaylists', function (Blueprint $table) {
            $table->id();

            //foraneas
            $table->unsignedBigInteger('ID_Usuario')->nullable();
            $table->foreign('ID_Usuario')->references('id')->on('users');
            //$table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('userplaylists');
    }
}
