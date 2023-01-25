<?php namespace Ibang\Tas\Models;

use Model;
use Ibang\TAS\Models\Subject;

/**
 * Model
 */
class Schedule extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    const SORT_ORDER = 'sort_order';

    protected $fillable = ['subject_id', 'staff_id', 'grade_id', 'day', 'time'];

    protected $dates = ['deleted_at'];

    public function getTextGradeAttribute()
    {
        $grade = '';
        if ($this->grade){
            $grade = Grade::find($this->grade_id)->text_grade;
        }
        return $grade;
    }

    public function getTimeOptions($keyValue = null)
    {
        $optList = [
            '07:00 - 07:45' => '07:00 - 07:45',
            '07:45 - 08:30' => '07:45 - 08:30',
            '08:30 - 09:15' => '08:30 - 09:15',
            '10:00 - 10:45' => '10:00 - 10:45',
            '10:45 - 11:30' => '10:45 - 11:30',
            '11:30 - 12:15' => '11:30 - 12:15'
        ];
        return $optList;
    }

    public function scopeFilterByGrade($query, $filter)
    {
        return $query->where('grade_id', $filter);
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_schedules';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'attendance' => ['Ibang\TAS\Models\Attendance'],
    ];

    public $belongsTo = [
        'grade' => ['Ibang\TAS\Models\Grade'],
        'subject' => ['Ibang\TAS\Models\Subject'],
        'staff' => [
            'Ibang\TAS\Models\Staff',
            'scope' => 'filterBySubject'
        ],
    ];
}
