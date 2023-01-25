<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIbangTasReport extends Migration
{
    public function up()
    {
        Schema::create('ibang_tas_report', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('staff_id');
            $table->integer('total_present');
            $table->integer('total_absent');
            $table->integer('attendance');
            $table->date('date');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ibang_tas_report');
    }
}
