<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumMatrixDisciplinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('curriculum_matrix_disciplines', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->foreignId('curriculum_matrix_id')->constrained('curriculum_matrices');
      $table->integer('period');
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
    Schema::dropIfExists('curriculum_matrix_disciplines');
  }
}
