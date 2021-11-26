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
      $table->string('school_year');
      $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete()->cascadeOnUpdate();
      $table->foreignId('matrix_curricular_id')->constrained('curriculum_matrices')->cascadeOnDelete()->cascadeOnUpdate();;
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
