<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Grade extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_grades';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getTextGradeAttribute()
    {
        $grade = '';
        if ($this->major_id && $this->level_id){
            // NOTE: being $this the object of your current model
            $major = Major::find($this->major_id);
            $level = Level::find($this->level_id);
            $grade = $level->level . ' ' . $major->major . ' ' . $this->grade;
        }
        return $grade;
    }

    public function getGradeOptions() {
        return Grade::lists('text_grade', 'id');
    }

    public $belongsTo = [
        'level' => [
            'Ibang\TAS\Models\Level',
            'key' => 'level_id',
        ],
        'major' => [
            'Ibang\TAS\Models\Major',
            'key' => 'major_id'
        ],
    ];
}
