<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')
                ->references('id')->on('users')->onDetele('set null');
            $table->string('nombre_usuario');
            $table->string('nombre_reporta');
            $table->date('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->string('entrada')->nullable();
            $table->string('mes')->nullable();
            $table->string('empresa')->nullable();
            $table->string('representante')->nullable();
            $table->text('domicilio')->nullable();
            $table->string('ambito')->nullable();
            $table->string('delegacion')->nullable();
            $table->text('contenido')->nullable();
            $table->text('codigo')->nullable();
            $table->text('codigoqueja')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
