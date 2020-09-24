<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArbolPadrinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('DB_MIGRACIONES', 'false') == 'false') {
            Schema::create('arbol__padrinos', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                ////////////////
                $table->integer('arbol_id')->unsigned();
                $table->foreign('arbol_id')->references('id')->on('arbols');
                ////////////////
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('arbol__padrinos');
    }
}
