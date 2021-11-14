<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffeDisciplineTimeOnWeekdaysTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('', function (Blueprint $table) {
      $table->id();
      $table->foreignId('offer_discipline_id')->constrained('offer_disciplines');
      $table->integer('position', 300);
      $table->boolean('active')->default(true);
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
    Schema::dropIfExists('offe_discipline_time_on_weekdays');
  }
}
