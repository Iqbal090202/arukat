<?php namespace Ibang\Tas\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Attendances extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\ImportExportController',
    ];

    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $importExportConfig = 'config_export.yaml';

    public $requiredPermissions = [
        'managesattendance'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ibang.Tas', 'schedule', 'listattendance');
    }
}
