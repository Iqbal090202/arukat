<?php namespace Backend\ReportWidgets;

use BackendAuth;
use Backend\Models\AccessLog;
use Backend\Classes\ReportWidgetBase;
use Backend\Models\BrandSetting;
use Exception;
use Ibang\TAS\Models\Major;
use Ibang\TAS\Models\Grade;
use Ibang\TAS\Models\Subject;
use Ibang\TAS\Models\Staff;
use Backend\ReportWidgets\Backend;

/**
 * User totalcard report widget.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class Totalcard extends ReportWidgetBase
{
    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'totalcard';

    /**
     * Renders the widget.
     */
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'backend::lang.dashboard.welcome.widget_title_default',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error',
            ],
            'data' => [
                'title'             => 'Data',
                'default'           => 'major',
                'type'              => 'dropdown',
            ]
        ];
    }

    public function getDataOptions()
    {
        return [
            'major'    => 'Major',
            'grade' => 'Grade',
            'subject' => 'Subject',
            'staff' => 'Staff',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function loadAssets()
    {
        $this->addCss('css/welcome.css', 'core');
    }

    protected function loadData()
    {
        $totalData = 0;
        $urlSeeAll = '';
        switch ($this->property('data')) {
            case 'major':
                $totalData = sizeof(Major::all());
                $urlSeeAll = 'ibang/tas/majors';
                break;
            case 'grade':
                $totalData = sizeof(Grade::all());
                $urlSeeAll = 'ibang/tas/grades';
                break;
            case 'subject':
                $totalData = sizeof(Subject::all());
                $urlSeeAll = 'ibang/tas/subjects';
                break;
            case 'staff':
                $totalData = sizeof(Staff::all());
                $urlSeeAll = 'ibang/tas/staffs';
                break;
            default:
                break;
        }
        $this->vars['totalMajor'] = $totalData;
        $this->vars['urlSeeAll'] = $urlSeeAll;
    }
}
