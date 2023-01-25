<?php namespace Ibang\Tas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateIbangTasReports extends Migration
{
    public function up()
    {
        Schema::rename('ibang_tas_report', 'ibang_tas_reports');
    }
    
    public function down()
    {
        Schema::rename('ibang_tas_reports', 'ibang_tas_report');
    }
}
