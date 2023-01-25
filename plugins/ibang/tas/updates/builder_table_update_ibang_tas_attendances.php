<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateIbangTasAttendances extends Migration
{
    public function up()
    {
        Schema::table('ibang_tas_attendances', function($table)
        {
            $table->date('date')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('ibang_tas_attendances', function($table)
        {
            $table->time('date')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
