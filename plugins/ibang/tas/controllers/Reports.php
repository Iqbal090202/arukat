<?php namespace Ibang\Tas\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Reports extends Controller
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
        'managereport'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ibang.Tas', 'schedule', 'listreport');
    }
}
