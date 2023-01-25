<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIbangTasSchedules extends Migration
{
    public function up()
    {
        Schema::create('ibang_tas_schedules', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('subject_id');
            $table->integer('staff_id');
            $table->integer('grade_id');
            $table->string('day');
            $table->string('time');
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ibang_tas_schedules');
    }
}
