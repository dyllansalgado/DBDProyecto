<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowerfollowedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followerfolloweds', function (Blueprint $table) {
            $table->id();

            //foraneas
            $table->unsignedBigInteger('ID_Seguidor')->nullable();
            $table->foreign('ID_Seguidor')->references('id')->on('users');
            //$table->foreign('ID_Seguidor')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('ID_Seguido')->nullable();
            $table->foreign('ID_Seguido')->references('id')->on('users');
            //$table->foreign('ID_Seguido')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('followerfolloweds');
    }
}
