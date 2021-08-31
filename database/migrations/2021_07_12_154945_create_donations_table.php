<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->date('Fecha_Donacion');
            $table->double('Valor_Donacion',9,3);

            //foraneas
            $table->unsignedBigInteger('ID_Video')->nullable();
            $table->foreign('ID_Video')->references('id')->on('videos');
            //$table->foreign('ID_Video')->references('id')->on('videos')->onDelete('cascade');

            $table->unsignedBigInteger('ID_Usuario')->nullable();
            $table->foreign('ID_Usuario')->references('id')->on('users');
            //$table->foreign('ID_Usuario')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('ID_Medio_Pago')->nullable();
            $table->foreign('ID_Medio_Pago')->references('id')->on('paymentmethods');
            //$table->foreign('ID_Medio_Pago')->references('id')->on('paymentmethods')->onDelete('cascade');
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
        Schema::dropIfExists('donations');
    }
}
