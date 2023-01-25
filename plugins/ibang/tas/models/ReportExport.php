<?php

namespace Ibang\TAS\Models;

use Db;
use \Backend\Models\ExportModel;
use \October\Rain\Support\Collection;
use Carbon\Carbon;

class ReportExport extends ExportModel {

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'year',
        'month'
    ];

    public function exportData($columns, $sessionKey = null)
    {
        // $records = Report::all();
        // dd($this->month);

        $records = Staff::all()->sortBy('name');
        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
            $reports = $record->report()->whereMonth('created_at', $this->month)->whereYear('created_at', $this->year)->get();

            $totalPresent = $totalPresent2 = $totalAbsent = $totalSchedule = 0;
            for ($i=0; $i < count($reports); $i++) {
                if ($reports[$i]->attendance == 1) {
                    $totalPresent += 1;
                } else if ($reports[$i]->attendance == 2) {
                    $totalPresent2 += 1;
                } else {
                    $totalAbsent += 1;
                }
            }
            $totalSchedule = $totalPresent + $totalPresent2 + $totalAbsent;
            $persentasi = $totalSchedule == 0 ? 0 : ($totalPresent + $totalPresent2) / $totalSchedule * 100;
            $persentasiAbsent = $totalSchedule == 0 ? 0 : $totalAbsent / $totalSchedule * 100;

            $record->nip = '\''.$record->nip;
            $record->total_present = $totalPresent;
            $record->total_present2 = $totalPresent2;
            $record->total_absent = $totalAbsent;
            $record->total_schedule = $totalSchedule;
            $record->persentasi = number_format((float)$persentasi, 2, ',', '').'%';
            $record->persentasi_absent = number_format((float)$persentasiAbsent, 2, ',', '').'%';
        });
        // dd($records->groupBy('staff_id')->toArray());
        // dd($staffs[0]->report()->where('date', '2023-01-23')->get());
        // dd($records->toArray());
        return $records->toArray();
    }

    public function getMonthOptions($keyValue = null)
    {
        $optList = [
            '1' => 'Januari',
            '2' => 'Febuari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $optList;
    }

    public function getYearOptions($keyValue = null)
    {
        // dd(Carbon::now()->subYear()->format('Y'));
        $optList = [
            '2023' => '2023',
        ];
        return $optList;
    }
}
