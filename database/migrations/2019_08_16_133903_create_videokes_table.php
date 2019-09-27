<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideokesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('videokes', function (Blueprint $table) {
        //     $table->integer('id', true);
		// 	$table->string('name', 30)->nullable();
		// 	$table->string('number', 20)->nullable();
		// 	$table->integer('price')->nullable();
		// 	$table->timestamps();
        // });
        Schema::create('videokes', function (Blueprint $table) {
            $table->integer('id', true);
			$table->string('name', 30)->nullable();
			$table->string('number', 20)->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('videokes');
    }
}
