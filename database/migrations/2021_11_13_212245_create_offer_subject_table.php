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
      $table->foreignId('semester_id')->constrained();
      $table->foreignId('weekday_id')->constrained();
      $table->foreignId('shift_id')->constrained();
      $table->foreignId('professor_id')->constrained();
      $table->foreignId('classroom_id')->constrained();
      $table->foreignId('subject_id')->constrained();
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
