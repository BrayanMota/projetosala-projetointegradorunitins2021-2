<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferDisciplinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('offer_disciplines', function (Blueprint $table) {
      $table->id();
      $table->foreignId('semester_id')->constrained();
      $table->foreignId('weekday_id')->constrained();
      $table->foreignId('shift_id')->constrained();
      $table->foreignId('professor_id')->constrained();
      $table->foreignId('classroom_id')->constrained();
      $table->integer('period');
      $table->string('discipline', 100);
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
