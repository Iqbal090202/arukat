<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Subject extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_subjects';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'major' => ['Ibang\TAS\Models\Major'],
    ];

}
