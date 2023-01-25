<?php namespace Ibang\Tas\Models;

use Model;

/**
 * Model
 */
class Level extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    const SORT_ORDER = 'sort_order';

    protected $dates = ['deleted_at'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ibang_tas_levels';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // public function setIdAttribute($value)
    // {
    //     $this->attributes['id'] = $value;
    // }
}
