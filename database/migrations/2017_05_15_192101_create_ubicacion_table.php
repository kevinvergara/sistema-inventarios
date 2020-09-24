<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('DB_MIGRACIONES', 'false') == 'false') {
            Schema::create('ubicacions', function (Blueprint $table) {
                $table->increments('id');
                ////////////////
                $table->integer('estacione_id')->unsigned();
                $table->foreign('estacione_id')->references('id')->on('estaciones');

                $table->string('edificio');
                $table->string('piso');
                ////////////////
                $table->integer('area_id')->unsigned();
                $table->foreign('area_id')->references('id')->on('areas');

                $table->string('imagen')->nullable();

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacions');
    }
}
