<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullTimePartTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_time_part_times', function (Blueprint $table) {
          $table->integer('project_id');
          $table->integer('emp_id');
          $table->integer('dept_id');
          $table->integer('num_of_hours');
          $table->date('works_date');

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
        Schema::dropIfExists('full_time_part_times');
    }
}
