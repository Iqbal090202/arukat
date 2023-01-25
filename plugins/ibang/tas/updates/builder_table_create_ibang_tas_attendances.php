<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIbangTasAttendances extends Migration
{
    public function up()
    {
        Schema::create('ibang_tas_attendances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->integer('schedule_id');
            $table->string('attendance');
            $table->text('description');
            $table->time('date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('sort_order')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ibang_tas_attendances');
    }
}
