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
          $table->integer('id_area')->unsigned();
          $table->foreign('id_area')
                  ->references('id')->on('area')->onDetele('set null');
          $table->integer('id_equipo')->unsigned();
          $table->foreign('id_equipo')
                  ->references('id')->on('equipo')->onDetele('set null');
          $table->integer('id_tipomante')->unsigned();
          $table->foreign('id_tipomante')
                  ->references('id')->on('tipo_manteniminto')->onDetele('set null');
          $table->date('fecha_reporte')->nullable();
          $table->string('telefono')->nullable();
          $table->string('email')->nullable();
          $table->string('nombre_reporta')->nullable();
          $table->text('listado')->nullable();
          $table->text('observacion')->nullable();
          $table->string('marca')->nullable();
          $table->string('modelo')->nullable();
          $table->string('serie')->nullable();
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
