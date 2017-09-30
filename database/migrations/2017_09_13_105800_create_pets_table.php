<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
          $table->increments('id');
          $table->string('photo_url');
          $table->string('name');
          $table->date('date_of_birth');
          $table->integer('weight');
          $table->string('gender');
          $table->string('scientific_species_name');
          $table->string('common_species_name');
          $table->integer('length');
          $table->text('notes')->nullable();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    public function down()
    {
      Schema::dropIfExists('pets');
    }
}
