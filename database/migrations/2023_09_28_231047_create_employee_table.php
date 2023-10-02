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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('full_name');
            $table->unsignedBigInteger('id_sex');
            $table->date('birthdate');
            $table->unsignedBigInteger('id_type');
            $table->text('num_ident');
            $table->string('photo');
            $table->timestamps();
            $table->foreign('id_sex')->references('id')->on('type_sexes')->onDelete('cascade');
            $table->foreign('id_type')->references('id')->on('type_idents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
