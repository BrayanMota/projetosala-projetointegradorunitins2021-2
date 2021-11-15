<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('classrooms', function (Blueprint $table) {
      $table->id();
      $table->foreignId('building_id')->constrained();
      $table->foreignId('classroom_type_id')->constrained();
      $table->integer('max_students');
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
    Schema::dropIfExists('classrooms');
  }
}
