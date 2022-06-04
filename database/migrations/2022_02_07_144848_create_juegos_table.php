<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('url')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('quantity');
            $table->integer('price');
            $table->enum('estado',['1','0'])->default('1');
            $table->foreignId('console_id')->references('id')->on('consoles')->onDelete('set null');
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
        Schema::dropIfExists('juegos');
    }
}
