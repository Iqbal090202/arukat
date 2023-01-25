<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Attendance extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_attendances';

    /**
     * scopeFilterByGroup
     */
    public function scopeFilterByStaff($query, $filter)
    {
        return $query->whereHas('schedule', function($schedule) use ($filter) {
            // dd($filter);
            $schedule->whereIn('staff_id', $filter);
        });
    }

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'schedule' => ['Ibang\TAS\Models\Schedule'],
        'user' => [
            'Rainlab\User\Models\User',
            // 'scope' => 'filterBySubject'
        ],
    ];
}
