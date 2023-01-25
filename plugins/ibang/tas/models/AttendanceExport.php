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
        // $records = Staff::whereHas('schedule', function($schedule) {
        //     $schedule->whereHas('attendance', function($attendance) {
        //         $attendance->whereBetween('date', ['2023-01-23', '2023-01-31']);
        //     });
        // })->get();

        // $records->each(function($record) use ($columns) {
        //     $record->schedule = $record->schedule()->whereHas('attendance', function($attendance) {
        //         $attendance->whereBetween('date', ['2023-01-23', '2023-01-31']);
        //     })->get();
        //     $record->hadir = $record->schedule->each(function($item) {
        //         $item->attendance->whereBetween('date', ['2023-01-23', '2023-01-31'])
        //     });
        // });

        $records = Staff::whereHas('schedule', function($schedule) {
            $schedule->whereHas('attendance', function($attendance) {
                $attendance->where('date', '2023-01-23');
            });
        })->get();

        dd($records);

        // dd($records[0]->schedule[0]->whereHas('attendance', function($attendance) {
        //     $attendance->whereBetween('date', ['2023-01-23', '2023-01-31']);
        // })->get());

        // $records->each(function($record) use ($columns) {
        //     $record->schedule = $record->schedule()->where('day', 'senin')->get();
        //     dd($record->schedule);
        //     $record->addVisible($columns);
        //     $record->text_grade = $record->user->grade->text_grade;
        //     $record->time = $record->schedule->time;
        //     $record->subject_name = $record->schedule->subject->name;
        //     $record->staff_name = $record->schedule->staff->name;
        // });

        return $records->toArray();
    }
}
