<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('semesters', function (Blueprint $table) {
      $table->id();
      $table->string('scholl_year');
      $table->foreignId('course_id')->constrained();
      $table->foreignId('matrix_curricular_id')->constrained('curriculum_matrices');
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
    Schema::dropIfExists('semesters');
  }
}
