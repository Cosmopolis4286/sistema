<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentes_emp', function (Blueprint $table) {
            $table->id();
            $table->string('mother_name');
            $table->string('father_name');
            $table->unsignedBigInteger('id_emp');
            $table->foreign('id_emp')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('parentes_emp');
    }
};
