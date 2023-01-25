<?php namespace Ibang\Tas\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Level extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'managelevel' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ibang.Tas', 'master', 'level');
    }
}
