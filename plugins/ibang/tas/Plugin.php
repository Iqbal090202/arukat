<?php namespace Ibang\Tas;

use System\Classes\PluginBase;
use Ibang\TAS\Models\Report as ReportModel;
use Ibang\TAS\Controllers\Reports as ReportsController;
use Carbon\Carbon;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        ReportsController::extendListFilterScopes(function($filter) {
            $filter->addScopes([
                'date' => [
                    'label' => 'Date',
                    'type' => 'daterange',
                    'default' => $this->myDefaultTime(),
                    'conditions' => "date >= ':afterDate' AND date <= ':beforeDate'"
                ],
            ]);
        });
    }

    public function myDefaultTime()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endofMonth();
        return [
            0 => $start,
            1 => $end,
        ];
    }
}
