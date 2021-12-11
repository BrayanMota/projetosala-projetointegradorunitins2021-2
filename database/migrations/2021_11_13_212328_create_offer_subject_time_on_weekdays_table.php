<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferSubjectTimeOnWeekdaysTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('offer_subject_time_on_weekdays', function (Blueprint $table) {
      $table->id();
      $table->foreignId('offer_subject_id')->constrained('offer_subjects')->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('position');
      $table->boolean('active')->default(false);
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
    Schema::dropIfExists('offer_discipline_time_on_weekdays');
  }
}
