<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Umaha\Courses\ReportWidgets\ProgressReports as ProgressReportsWidget;

/**
 * Courses Back-end Controller
 */
class Courses extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('umaha.Courses', 'courses', 'courses');
    }

    public function beforeDisplay()
    {
        $progressReports = new ProgressReportsWidget($this);
        $progressReports->alias = 'progressReportsWidget';
        $progressReports->bindToController();
    }
}
