<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Report extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_reports';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getTextAttendanceAttribute()
    {
        // dd($this->attendance);
        if ($this->attendance == 1) {
            $text_attendance = 'Hadir (Full)';
        } else if ($this->attendance == 2) {
            $text_attendance = 'Hadir (Tidak Full)';
        } else {
            $text_attendance = 'Tidak Hadir';
        }
        return $text_attendance;
    }

    public $belongsTo = [
        'staff' => ['Ibang\TAS\Models\Staff'],
    ];
}
