<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateIbangTasSubjectsStaffs extends Migration
{
    public function up()
    {
        Schema::table('ibang_tas_subjects_staffs', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('ibang_tas_subjects_staffs', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
}
