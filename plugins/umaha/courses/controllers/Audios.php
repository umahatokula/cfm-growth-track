<?php namespace Umaha\Courses\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Audios Back-end Controller
 */
class Audios extends Controller
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

        BackendMenu::setContext('umaha.Courses', 'courses', 'audios');
    }
}