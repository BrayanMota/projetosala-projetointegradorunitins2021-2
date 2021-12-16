<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferSubjectTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('offer_subjects', function (Blueprint $table) {
      $table->id();
      $table->foreignId('semester_id')->constrained('semesters')->cascadeOnDelete()->cascadeOnUpdate();
      $table->foreignId('weekday_id')->constrained('weekdays')->cascadeOnDelete()->cascadeOnUpdate();
      $table->foreignId('shift_id')->constrained('shifts')->cascadeOnDelete()->cascadeOnUpdate();
      $table->string('professor');
      $table->string('subject_id');
      $table->integer('period');
      $table->foreignId('classroom_id')->constrained('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
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
    Schema::dropIfExists('offer_disciplines');
  }
}
