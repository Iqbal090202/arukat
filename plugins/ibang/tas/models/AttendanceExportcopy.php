<?php

namespace Ibang\TAS\Models;

use Db;
use \Backend\Models\ExportModel;
use \October\Rain\Support\Collection;

class AttendanceExport extends ExportModel {

    /**
     * @var array Fillable fields
     */
    // protected $fillable = [];

    public function exportData($columns, $sessionKey = null)
    {
        $records = Attendance::all();

        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
            $record->text_grade = $record->user->grade->text_grade;
            $record->time = $record->schedule->time;
            $record->subject_name = $record->schedule->subject->name;
            $record->staff_name = $record->schedule->staff->name;
        });

        return $records->toArray();
    }
}
