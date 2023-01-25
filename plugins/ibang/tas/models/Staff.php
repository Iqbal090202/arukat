<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Staff extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_staffs';

    public function scopeFilterBySubject($query, $parent){
        if ($parent->subject) {
            $query->whereHas('subject', function($subject) use ($parent) {
                $subject->where('subject_id', $parent->subject->id);
            });
            // $query->where('subject_id', $parent->subject->id);
        }
        return $query;
    }

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'schedule' => ['Ibang\TAS\Models\Schedule'],
        'report' => ['Ibang\TAS\Models\Report'],
    ];

    public $belongsToMany  = [
        'subject' => [
            'Ibang\TAS\Models\Subject',
            'table' => 'ibang_tas_subjects_staffs',
            'key' => 'staff_id',
            'otherKey' => 'subject_id',
        ],
    ];

    public function getStaffOptions() {
        return Staff::lists('name', 'id');
    }

}
