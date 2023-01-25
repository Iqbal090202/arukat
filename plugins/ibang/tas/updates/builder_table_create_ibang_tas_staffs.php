<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateIbangTasStaffs extends Migration
{
    public function up()
    {
        Schema::create('ibang_tas_staffs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nip', 20)->unique();
            $table->string('name', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ibang_tas_staffs');
    }
}
