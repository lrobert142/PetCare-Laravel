<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeighingsTable extends Migration
{
    public function up()
    {
      Schema::enableForeignKeyConstraints();
      Schema::create('weighings', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('pet_id')->unsigned();
        $table->date('date')->default(\Carbon\Carbon::now());
        $table->integer('weight');
        $table->boolean('is_initial')->default(false);
        $table->text('notes')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('pet_id')->references('id')->on('pets');
      });
    }

    public function down()
    {
      Schema::dropIfExists('weighings');
    }
}
